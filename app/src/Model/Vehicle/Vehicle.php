<?php


namespace Red\Model\Vehicle;


use Red\Model\Unit\UnitInterface;
use Webmozart\Assert\Assert;

abstract class Vehicle implements VehicleInterface {

	/** @var array */
	protected $units;

	/** @var integer */
	protected $currentWeight;


	/**
	 * Vehicle constructor.
	 */
	public function __construct() {
		$this->units = [];
		$this->currentWeight = 0;
	}

	/**
	 * @param UnitInterface $unit
	 * @return bool
	 */
	abstract protected function canAddUnit(UnitInterface $unit): bool;

	/**
	 * @param array $units
	 */
	public function load(array $units): void {
		foreach ($units as $unit) {
			Assert::implementsInterface($unit, UnitInterface::class, "Unit has to implement UnitInterface");
			$this->addUnit($unit);
		}
	}

	/**
	 * @param UnitInterface $unit
	 */
	public function addUnit(UnitInterface $unit): void {
		if ($this->canAddUnit($unit)) {
			$this->registerUnit($unit);
		}
	}


	/**
	 * @param UnitInterface $unit
	 */
	protected function registerUnit(UnitInterface $unit) {
		$this->units[] = $unit;
		$this->increaseWeight($unit);
	}


	/**
	 * @param UnitInterface $unit
	 */
	protected function increaseWeight(UnitInterface $unit) {
		$this->currentWeight += $unit->getWeight();
	}

	/**
	 * @return array
	 */
	public function getUnits(): array {
		return $this->units;
	}

	public function __toString() {
		$return = "VEHICLE: ".(new \ReflectionClass($this))->getShortName() ."\n";
		foreach ($this->units as $unit) {
			$return .= (string) $unit;
		}
		return $return;
	}

}