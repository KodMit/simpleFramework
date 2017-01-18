<?php
/**
* Bundles class
*/
class Bundle
{

	private $jsonFile;
	private $jsonData;
	
	function __construct()
	{
		$this->jsonFile = file_get_contents("bundles.json");
		$this->jsonData = json_decode($this->jsonFile);
	}

	public function getBundles(){
		return $this->jsonData;
	}

	public function getFile($name){
		return $this->jsonData->$name->file;
	}

	public function getClass($name){
		return $this->jsonData->$name->class;
	}
}
