<?php
session_start();

if ($_POST) {
	// Execute code (such as database updates) here.

	$id = $_POST ['id'];
	$cat = $_POST ['cat'];
	$price = $_POST ['price'];
	$name = $_POST ['name'];
	$imgSource = $_POST ['imgSource'];
	$desc = $_POST ['description'];

	require_once 'db/productDB.php';
	
	$db = new ProductDb();
	$success = $db->insertProduct($id, $cat, $price, $name, $imgSource, $desc);
	$_SESSION['insertSuccessful'] = $success;
	
	// Redirect to this page.
	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

?>

<html>
<head></head>
<body>
<header><p>
<?php
// return success of failure message
if (isset($_SESSION['insertSuccessful'])){
	if($_SESSION["insertSuccessful"]){
		echo "gespeichert";
	} else {
		echo "fehler";
	}
	unset($_SESSION["insertSuccessful"]);
}
?>
</p></header>
<main>
<form method="post">
ID<input type="number" name="id"/><br/>
CATEGORY<select name="cat">
<?php 
	require_once 'oop/Category.php';

	echo "<option>".Category::GAS."</option>";
	echo "<option>".Category::ELECTRO."</option>";
	echo "<option>".Category::ROBOT."</option>";
	echo "<option>".Category::TRACTOR."</option>";
	echo "<option>".Category::HAND."</option>";
	echo "<option>".Category::EQUIPMENT."</option>";
?>
</select><br/>
PRICE<input type="text" name="price"/><br/>
NAME<input type="text" name="name"/><br/>
IMAGE SOURCE<input type="text" name="imgSource"/><br/>
DESCRIPTION<textarea rows="3" cols="20" name="description"></textarea><br/>
<input type="submit" value="save"/>
</form>
</main>
<footer>
<?php 
require_once 'db/productDB.php';

$db = new ProductDb();
$prods = $db->getAllProducts();
var_dump($prods);
?>
</footer>
</body>
</html>
