<?php 

require_once 'db/productDB.php';

/* Product file list for dynamic implementation */
function getProducts(){
	
	// define the product category
	$category = $_SESSION[PLACE];
	
	// load the products
	$prodDb = new ProductDb();
	$products = $prodDb->getProducts($category);
	
	// List the products
	$html = '<div id="products">';
	$html .= "<h1>Products - ".$_SESSION['text'][$category]."</h1>";
	
	foreach( $products as $product ) {
		$html .= '<form class="product" method="post" onmouseover="this.style.background = \'#f99\'" onmouseout="this.style.background = \'#ddd\'">';
		$html .= "<h3>" . $product->name . "</h3>";
		$html .= '<img src="' . $product->imgSource . '" />';
		$html .= "<p> Price:  " . $product->price . " CHF</p>";
		$html .= "<p>" . "Description: " . $product->description . "</p>";
		$html .= "<input type='hidden' name='productId' value='" . $product->id . "'/>";
		$html .= "<input class='submit' type='submit' value='Buy'/>";
		$html .= "</form>";
	}
	
	$html .= '</div>';
	
	return $html;
}

?>