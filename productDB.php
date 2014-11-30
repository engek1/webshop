<?php
include_once 'oop/Product.php';

// $db = new mysqli ( "localhost", "webshop_user", "webshop_user", "webshop" );
// $statement = $db->prepare ( "SELECT * from Product" );

// $statement->execute ();
// $result = $statement->get_result();
// while ( $product = $result->fetch_object() )
// 	echo $product->name . " - " . $product->price;

// $result->close();
// $statement->close ();

$prodDb = new ProductDb();
$res = $prodDb->getAllProducts();

var_dump($res);

class ProductDb extends mysqli {
	
	public function getAllProducts() {
		
		$statement = parent::prepare( "SELECT * from Product" );
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
		$statement->close ();
		return $products;
	}
	
	public function deleteProduct($id) {
		$this->query("DELETE FROM student WHERE ID = $id");
	}
	public function insertProduct($lname, $fname, $semes) {
		$this->query("INSERT student (LastName, FirstName,
				semester) VALUES ('$lname','$fname','$semes')");
	}
	public function updateProduct($id, $lname, $fname, $semes) {
		$this->query("UPDATE student SET LastName='$lname',
				FirstName='$fname', semester='$semes' WHERE ID=$id");
	}
	
	public function __construct() {
		parent::__construct("localhost", "webshop_user", "webshop_user", "webshop");
	}
	
}

?>