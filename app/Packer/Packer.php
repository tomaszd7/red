<?php

namespace Red\Packer;

use Red\Exception\VehicleIsFullException;
use Red\Factory\VehicleFactory;
use Red\Model\Unit\UnitInterface;
use Red\Model\Vehicle\VehicleInterface;
use Webmozart\Assert\Assert;

class Packer {

	/** @var array */
	protected $incomingVehicles;

	/** @var array */
	protected $ourVehicles;

	/** @var array */
	protected $currentVehicle;

	/**
	 * Packer constructor.
	 */
	public function __construct() {
		$this->ourVehicles = [];
		$this->currentVehicle = [];
	}

	/**
	 * @param array $incomingVehicles
	 */
	public function registerIncomingVehicles(array $incomingVehicles) {
		foreach ($incomingVehicles as $incomingVehicle) {
			Assert::implementsInterface($incomingVehicle, VehicleInterface::class, "Incoming Vehicle has to implement VehicleInterface");
			$this->incomingVehicles[] = $incomingVehicle;
		}
	}

	/**
	 *
	 */
	public function packToOurTransport() {
		/** @var VehicleInterface $vehicle */
		foreach ($this->incomingVehicles as $vehicle) {
			/** @var UnitInterface $unit */
			foreach ($vehicle->getUnits() as $unit) {
				$this->processUnit($unit, get_class($vehicle));
			}
		}
		// clean
		$this->ourVehicles = array_merge($this->ourVehicles, array_values($this->currentVehicle));
		$this->currentVehicle = [];
	}

	/**
	 * @param UnitInterface $unit
	 * @param               $vehicleType
	 */
	protected function processUnit(UnitInterface $unit, $vehicleType) {
		$this->createNewVehicle($unit, $vehicleType);

		try {
			$this->currentVehicle[$vehicleType]->addUnit($unit);
		} catch (VehicleIsFullException $fullVehicleException) {
			// todo check for max recur
			$this->ourVehicles[] = $this->currentVehicle[$vehicleType];
			$this->currentVehicle[$vehicleType] = VehicleFactory::createVehicle($unit);
			$this->currentVehicle[$vehicleType]->addUnit($unit);
		} catch (\Exception $e) {
			dump('EXCEPTION: ' . $e->getMessage());
		}

	}

	/**
	 * @param UnitInterface $unit
	 * @param               $vehicleType
	 */
	protected function createNewVehicle(UnitInterface $unit, $vehicleType) {
		if (!isset($this->currentVehicle[$vehicleType]) || is_null($this->currentVehicle[$vehicleType])) {
			$this->currentVehicle[$vehicleType] = VehicleFactory::createVehicle($unit);
		}
	}

}