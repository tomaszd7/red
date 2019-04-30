<?php


namespace Red\Model\Unit;


class FarmMachineBig extends Unit {

	const WEIGHT = 2000;

	public function __construct() {
		parent::__construct(self::WEIGHT);
	}

	protected function validate() {
		return;
	}

}