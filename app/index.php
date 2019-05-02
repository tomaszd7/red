<?php

use Red\Model\Vehicle\IncomingMachineTruck;
use Red\Model\Vehicle\IncomingPackageTruck;
use Red\Packer\Packer;
use Red\Test\PackageGenerator;

require __DIR__ . '/vendor/autoload.php';


try {
	// preparing incoming transport
	$load1          = PackageGenerator::generatePackages(15);
	$load2          = PackageGenerator::generatePackages(19);
	$incomingTruck1 = new IncomingPackageTruck();
	$incomingTruck1->load($load1);
	$incomingTruck2 = new IncomingPackageTruck();
	$incomingTruck2->load($load2);
	$incomingMachineTruck = new IncomingMachineTruck();

	// doing the job you hired us for
	$packer = new Packer();
	$packer->registerIncomingVehicles([$incomingTruck1, $incomingMachineTruck, $incomingTruck2]);
	$packer->packToOurTransport();

	// simple output to see what is happening
	echo nl2br($packer);

} catch (Exception $e) {
	echo "SORRY we are trying to pack your packages but are at lunch now.<br><br>";
	echo "If still interested this is the error: " . $e->getMessage();
}
