<?php
namespace Red\Model\Unit;

interface UnitInterface {

	public function getUuid(): string;

	public function getWeight(): int;

}