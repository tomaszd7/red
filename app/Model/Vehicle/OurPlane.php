<?php


namespace Red\Model\Vehicle;


use Red\Exception\VehicleIsFullException;
use Red\Model\Unit\FarmMachineBig;
use Red\Model\Unit\FarmMachineSmall;
use Red\Model\Unit\UnitInterface;
use Webmozart\Assert\Assert;

class OurPlane extends Vehicle {

	const MACHINE_COUNT_MAX = 2;

	/**
	 * @param UnitInterface $unit
	 * @return bool
	 * @throws VehicleIsFullException
	 */
	protected function canAddUnit(UnitInterface $unit): bool {
		Assert::isInstanceOfAny($unit, [FarmMachineSmall::class, FarmMachineBig::class], "Incoming track only takes Machine Units");
		if (count($this->units) + 1 > self::MACHINE_COUNT_MAX) {
			throw new VehicleIsFullException();
		}
		return true;
	}

}