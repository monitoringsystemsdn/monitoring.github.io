<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$factory = (new Factory)->withServiceAccount(__DIR__.'/sdn-patient-management-system-firebase-adminsdk-9d64r-2a64275938.json');

$database = $factory->createDatabase();
?>
					