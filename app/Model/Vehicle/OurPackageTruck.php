<?php


namespace Red\Model\Vehicle;


use Red\Exception\VehicleIsFullException;
use Red\Model\Unit\Package;
use Red\Model\Unit\UnitInterface;
use Webmozart\Assert\Assert;

class OurPackageTruck extends Vehicle {

	const WEIGHT_MAX = 200;

	/**
	 * @param UnitInterface $unit
	 * @return bool
	 * @throws VehicleIsFullException
	 */
	protected function canAddUnit(UnitInterface $unit): bool {
		Assert::isInstanceOf($unit, Package::class, "Our track only takes Packages Units");
		Assert::lessThanEq($this->currentWeight, self::WEIGHT_MAX, "Maximum weight exceeded for our truck.");
		if ($this->currentWeight + $unit->getWeight() > self::WEIGHT_MAX) {
			throw new VehicleIsFullException();
		}
		return true;
	}

}