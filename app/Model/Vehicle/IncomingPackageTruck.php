<?php


namespace Red\Model\Vehicle;


use Red\Exception\VehicleIsFullException;
use Red\Model\Unit\Package;
use Red\Model\Unit\UnitInterface;
use Webmozart\Assert\Assert;

class IncomingPackageTruck extends Vehicle {

	const PACKAGES_COUNT_MIN = 5;
	const PACKAGES_COUNT_MAX = 20;

	/**
	 * @param UnitInterface $unit
	 * @return bool
	 * @throws \Red\Exception\VehicleIsFullException
	 */
	protected function canAddUnit(UnitInterface $unit): bool {
		Assert::isInstanceOf($unit, Package::class, "Incoming track only takes Packages Units");
		if (count($this->units) + 1 > self::PACKAGES_COUNT_MAX) {
			throw new VehicleIsFullException();
		}
		return true;
	}

}