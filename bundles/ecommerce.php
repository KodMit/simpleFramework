<?php
 /**
 * E-commerceBundle
 */
 class Ecommerce
 {
 	public $name;
 	public $qty;
 	public $price;
 	public $ref;
 	public $description;
 	public $img;
 	
 	function __construct(argument)
 	{
 		include('database.php');
 	}

 	// Products

 	public function productExist($pRef){
 		include('database.php');

 		$ref = htmlspecialchars($pRef);

 		$verif = $bdd->query('SELECT * FROM products WHERE ref = "'.$ref.'"');
		$count = $verif->rowCount();
		if ($count >= 1) {
			return true;
		}
		else{
			return false;
		}

 	}

 	public function addProduct($pName, $pQty, $pPrice, $pRef, $pDescription, $pImg){
 		include('database.php');

 		$name = htmlspecialchars($pName);
 		$qty = htmlspecialchars($pQty);
 		$price = htmlspecialchars($pPrice);
 		$ref = htmlspecialchars($pRef);
 		$description = htmlspecialchars($pDescription);
 		$img = htmlspecialchars($pImg);

 		if(productExist($ref)){
 			return false;
 		}
 		else{
 			$req = $bdd->prepare('INSERT INTO products(name, qty, price, ref, description, img) VALUES(:name, :qty, :price, :ref, :description, :img)');
			$req->execute(array(
				'name' => $name,
				'qty' => $qty,
				'price' => $price,
				'ref' => $ref,
				'description' => $description,
				'img' => $img
			));
			return true;
 		}	
 	}

 	public function editProduct($pRef){
 		include('database.php');

 	}

 	public function removeProduct($pRef){
 		include('database.php');

 	}

 	public function getProductId($pRef){
 		include('database.php');

 	}
 }
