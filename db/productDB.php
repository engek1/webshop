<?php
include_once 'oop/Product.php';

class ProductDb extends mysqli {
	
	public function getAllProducts() {
		
		$statement = parent::prepare( "SELECT * FROM Product" );
		$statement->execute();
		$result = $statement->get_result();
		
		$products = array();
		while ( $p = $result->fetch_object()) {
			// id, name, imgSource, description, category, price
			$prod = new Product($p->id, $p->name, $p->imgSource, $p->description, $p->category, $p->price);
			$products[$p->id] = $prod;
		}
		// close statement and result
		$result->close();
		$statement->close();
		return $products;
	}
	
	public function getProducts($category){
		$statement = parent::prepare( "SELECT * FROM Product WHERE category=?" );
		$statement->bind_param("s", $category);
		$statement->execute();
		$result = $statement->get_result();
		
		$products = array();
		while ( $p = $result->fetch_object()) {
			// id, name, imgSource, description, category, price
			$prod = new Product($p->id, $p->name, $p->imgSource, $p->description, $p->category, $p->price);
			$products[$p->id] = $prod;
		}
		// close statement and result
		$result->close();
		$statement->close();
		return $products;
	}
	
	public function deleteProduct($id) {
		//$this->query("DELETE FROM student WHERE ID = $id");
	}
	public function insertProduct($id, $category, $price, $name, $imgSource, $desc) {
		$statement = parent::prepare( "INSERT Product (id, name, imgSource, description, category, price)
				VALUES (?, ?, ?, ?, ?, ?)" );
		$statement->bind_param("issssd", $id, $name, $imgSource, $desc, $category, $price);
		$success = $statement->execute();
		$statement->close();
		return $success;//bool
	}
	public function updateProduct($id, $lname, $fname, $semes) {
// 		$this->query("UPDATE student SET LastName='$lname',
// 				FirstName='$fname', semester='$semes' WHERE ID=$id");
	}
	
	public function __construct() {
		parent::__construct("localhost", "webshop_user", "webshop_user", "webshop");
	}
	
}

?>