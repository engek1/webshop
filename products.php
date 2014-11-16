<?php 

require_once 'productArray.php';

/* Product file list for dynamic implementation */
function getProducts(){
	
	$category = $_SESSION[PLACE];
	
	//Listing the products
	
	//Helper variable $html for html code printout
	$html = '<div id="products">';
	$html .= "<h1>Products - ".$_SESSION['text'][$category]."</h1>";
	
	foreach( $GLOBALS['products'] as $id => $product ) {
		if( $product['category'] == $category ){
			$html .= '<form class="product" method="post">';
			$html .= "<h3>" . $product["name"] . "</h3>";
			$html .= '<img src="' . $product["imgSource"] . '" />';
			$html .= "<p> Price:  " . $product["price"] . " CHF</p>";
			$html .= "<p>" . "Description: " . $product["description"] . "</p>";
			$html .= "<input type='hidden' name='productId' value='" . $id . "'/>";
			$html .= "<input class='submit' type='submit' value='Buy'/>";
			$html .= "</form>";
		}
		
	}
	
	$html .= '</div>';
	
	return $html;
}

?> 