<?php


namespace Red\Model\Vehicle;


use Red\Model\Unit\FarmMachineBig;
use Red\Model\Unit\FarmMachineSmall;
use Red\Model\Unit\UnitInterface;
use Webmozart\Assert\Assert;

class OurPlane extends Vehicle {

	const MACHINE_COUNT_MAX = 2;

	protected function canAddUnit(UnitInterface $unit): bool {
		Assert::isInstanceOf($unit, FarmMachineSmall::class, "Incoming track only takes Machine Units");
		Assert::isInstanceOf($unit, FarmMachineBig::class, "Incoming track only takes Machine Units");
		return true;
	}

}