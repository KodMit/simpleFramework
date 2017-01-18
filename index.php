<?php
// This file don't need to be edited
require('./config/config.php');
require('./routing.php');
require('./bundles.php');

if (!isset($_GET['page'])) {
	header("Location: index.php?page=");
}

// Bundle system
$bundle = new Bundle();
foreach ($bundle->getBundles() as $bundleM) {
	include('./bundles/'.$bundleM->file);
	$bundleM->class = new $bundleM->class;
}

// Routing system
$routing = new Routing();
foreach ($routing->getRoutes() as $data) {
	if ($_GET['page'] == $data->link) {
		include('templates/'.$data->file);
	}
}
