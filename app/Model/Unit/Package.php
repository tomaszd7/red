<?php


namespace Red\Model\Unit;


use Webmozart\Assert\Assert;

class Package extends Unit {

	const WEIGHT_MIN = 10;
	const WEIGHTY_MAX = 20;

	public function __construct(int $weight) {
		parent::__construct($weight);
	}

	protected function validate() {
		Assert::greaterThanEq(
			$this->weight,
			self::WEIGHT_MIN,
			sprintf('Weight has to be bigger/equal than %d but is %d', self::WEIGHT_MIN, $this->weight));
		Assert::lessThanEq(
			$this->weight,
			self::WEIGHTY_MAX,
			sprintf('Weight has to be lower/equal than %d but is %d', self::WEIGHTY_MAX, $this->weight));
	}

}