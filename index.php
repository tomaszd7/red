<?php

require __DIR__ . '/vendor/autoload.php';


$package1 = new \Red\Model\Unit\Package(10);
$package2 = new \Red\Model\Unit\Package(20);
$package3 = new \Red\Model\Unit\Package(10);

$incomingTruck = new \Red\Model\Vehicle\IncomingPackageTruck();
$incomingTruck->load([$package1, $package2, $package3]);


dump($incomingTruck);


$incomingMachineTruck = new \Red\Model\Vehicle\IncomingMachineTruck();

dump($incomingMachineTruck);