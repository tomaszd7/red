<?php


namespace Red\Model\Vehicle;


use Red\Model\Unit\FarmMachineBig;
use Red\Model\Unit\FarmMachineSmall;
use Red\Model\Unit\UnitInterface;

class IncomingMachineTruck extends Vehicle {

	/**
	 * IncomingMachineTruck constructor.
	 * @throws \Exception
	 */
	public function __construct() {
		parent::__construct();
		$smallMachine = new FarmMachineSmall();
		$this->registerUnit($smallMachine);
		$bigMachine = new FarmMachineBig();
		$this->registerUnit($bigMachine);
	}

	/**
	 * @param UnitInterface $unit
	 */
	public function addUnit(UnitInterface $unit): void {
		return;
	}


	/**
	 * @param UnitInterface $unit
	 * @return bool
	 */
	protected function canAddUnit(UnitInterface $unit): bool {
		return false;
	}

}