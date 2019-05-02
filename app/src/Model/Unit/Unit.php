<?php

namespace Red\Model\Unit;

use Ramsey\Uuid\Uuid;

abstract class Unit implements UnitInterface {

	/** @var string */
	protected $uuid;
	/** @var int */
	protected $weight;


	/**
	 * Unit constructor.
	 * @param int $weight
	 * @throws \Exception
	 */
	public function __construct(int $weight) {
		$this->uuid = Uuid::uuid4()->toString();
		$this->weight = $weight;
		$this->validate();
	}

	/**
	 * @return mixed
	 */
	abstract protected function validate();

	/**
	 * @return string
	 */
	public function getUuid(): string {
		return $this->uuid;
	}

	/**
	 * @return int
	 */
	public function getWeight(): int {
		return $this->weight;
	}
}