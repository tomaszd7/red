<?php

namespace Red\Test;

use Red\Model\Unit\Package;

class PackageGenerator {

	/**
	 * @param int $number
	 * @return array
	 * @throws \Exception
	 */
	public static function generatePackages(int $number) {
		$number   = abs($number);
		$packages = [];
		while ($number > 0) {
			$packages[] = new Package(random_int(Package::WEIGHT_MIN, Package::WEIGHTY_MAX));
			$number--;
		}
		return $packages;
	}
}