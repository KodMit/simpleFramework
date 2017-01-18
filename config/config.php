<?php

// Edit the values bellow :

$userSystem = true;
$useDatabase = true;
$devMode = true;

if ($devMode) {
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}

if($useDatabase){
	require('././bundles/database.php');
}


// Don't edit the values bellow !

if($userSystem){
	include('././bundles/user.php');
}
