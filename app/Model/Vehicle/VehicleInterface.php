<?php
namespace Red\Model\Vehicle;

use Red\Model\Unit\UnitInterface;

interface VehicleInterface {

	public function addUnit(UnitInterface $unit): void;

	public function load(array $units): void;
}