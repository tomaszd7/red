<?php


namespace Red\Model\Unit;


class FarmMachineSmall extends Unit {

	const WEIGHT = 1500;

	public function __construct() {
		parent::__construct(self::WEIGHT);
	}

	protected function validate() {
		return;
	}

}