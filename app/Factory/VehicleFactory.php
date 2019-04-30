<?php


namespace Red\Factory;

use Red\Model\Unit\FarmMachineBig;
use Red\Model\Unit\FarmMachineSmall;
use Red\Model\Unit\Package;
use Red\Model\Unit\UnitInterface;
use Red\Model\Vehicle\OurPackageTruck;
use Red\Model\Vehicle\OurPlane;

class VehicleFactory {

	public static function createVehicle(UnitInterface $unit) {

		switch (get_class($unit)) {
			case Package::class:
				return new OurPackageTruck();
			case FarmMachineSmall::class:
			case FarmMachineBig::class:
				return new OurPlane();
			default:
				return;
		}

	}
}