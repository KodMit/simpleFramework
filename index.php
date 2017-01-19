<?php
// This file don't need to be edited
require('./config/config.php');
require('./routing.php');
require('./bundles.php');

$bundle = new Bundle();
foreach ($bundle->getBundles() as $bundleM) {
	include('./bundles/'.$bundleM->file);
	$bundleM->class = new $bundleM->class;
}

$routing = new Routing();
foreach ($routing->getRoutes() as $data) {
	if (isset($_GET['page'])) {
		if ($_GET['page'] == $data->link) {
			include('templates/'.$data->file);
		}
	}
	else{
		include_once('templates/'.$routing->getFile("index"));
	}
}
