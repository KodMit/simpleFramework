<?php
require('./config/config.php');
require('./routing.php');

if (!isset($_GET['page'])) {
	header("Location: index.php?page=");
}

// Routing system
$routing = new Routing();
foreach ($routing->getRoutes() as $data) {
	if ($_GET['page'] == $data->link) {
		include('templates/'.$data->file);
	}
}