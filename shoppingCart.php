<?php

require_once 'productArray.php';

function getChart(){

	if(!isset($_SESSION['shoppingChart'])){
		$_SESSION['shoppingChart'] = array();
	}
	
	if (isset($_POST['productId'])) {
		
		// get product id from request
		$pid = $_POST['productId'];
		// valid product key?
		if(array_key_exists($pid, $GLOBALS['products'])){
			// add or increase?
			if(array_key_exists($pid, $_SESSION['shoppingChart'])){
				$_SESSION['shoppingChart'][$pid]++;
			}else {
				$_SESSION['shoppingChart'][$pid] = 1;
			}
		}
		
	}
	
	$myProducts = $_SESSION['shoppingChart'];
	
	$html = "<div id='shoppingChart' >";
	$html .= "<table>";
	$html .= "<tr><th>Produkt</th><th>Anz.</th></tr>";
	
	foreach ($myProducts as $id => $num){
		$html .= "<tr>";
		$html .= "<td>". $GLOBALS['products'][$id]['name'] ."</td>";
		$html .= "<td>$num</td>";
		$html .= "</tr>";
	}
	
	$html .= "</table>";
	$html .= "</div>";
	
	return $html;

}

?>