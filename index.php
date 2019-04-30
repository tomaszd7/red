<?php

use Red\Model\Unit\Package;
use Red\Model\Vehicle\IncomingMachineTruck;
use Red\Model\Vehicle\IncomingPackageTruck;
use Red\Packer\Packer;

require __DIR__ . '/vendor/autoload.php';


$package1 = new Package(10);
$package2 = new Package(20);
$package3 = new Package(10);

$incomingTruck1 = new IncomingPackageTruck();
$incomingTruck1->load([$package1, $package2, $package3]);

$incomingTruck2 = new IncomingPackageTruck();
$incomingTruck2->load([$package1, $package2, $package3]);

$incomingMachineTruck = new IncomingMachineTruck();

$packer = new Packer();
$packer->registerIncomingVehicles([$incomingTruck1, $incomingMachineTruck, $incomingTruck2]);

$packer->packToOurTransport();

dump($packer);