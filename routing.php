<?php
/**
* Routing class
*/
class Routing
{

	private $jsonFile;
	private $jsonData;
	
	function __construct()
	{
		$this->jsonFile = file_get_contents("routes.json");
		$this->jsonData = json_decode($this->jsonFile);
	}

	public function getRoutes(){
		return $this->jsonData;
	}

	public function getFile($name){
		return $this->jsonData->$name->file;
	}

	public function getLink($name){
		$link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$this->jsonData->$name->link;
		return $link;
	}
}
