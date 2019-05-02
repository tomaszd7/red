<?php

namespace Red\Exception;

class VehicleIsFullException extends RedException {

	/**
	 * VehicleIsFullException constructor.
	 */
	public function __construct() {
		parent::__construct("Vehicle is full. Cannot take more packages. \n" . $this->getFile());
	}
}