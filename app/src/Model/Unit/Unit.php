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
		$this->uuid = substr(Uuid::uuid4()->toString(), 0, 8);
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

	public function __toString() {
		$return = "&nbsp&nbspUNIT: " .(new \ReflectionClass($this))->getShortName();
		$return .= "&nbsp&nbsp&nbsp&nbsp id: {$this->uuid} weight: {$this->weight}\n";
		return $return;
	}
}