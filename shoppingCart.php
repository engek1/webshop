<?php
require_once 'productArray.php';
require_once 'language.php';

function handleCart(){
	if (! isset ( $_SESSION ['shoppingCart'] )) {
		$_SESSION ['shoppingCart'] = array ();
	}
	
	if (isset ( $_POST ['productId'] )) {
	
		// get product id from request
		$pid = $_POST ['productId'];
		// valid product key?
		if (array_key_exists ( $pid, $GLOBALS ['products'] )) {
			// add or increase?
			if (array_key_exists ( $pid, $_SESSION ['shoppingCart'] )) {
				$_SESSION ['shoppingCart'] [$pid] ++;
			} else {
				$_SESSION ['shoppingCart'] [$pid] = 1;
			}
		}
	}
	
	if (isset ( $_POST ['removeProductId'] )) {
		// get product id from request
		$pid = $_POST ['removeProductId'];
		// valid product key?
		if (array_key_exists ( $pid, $GLOBALS ['products'] )) {
			// decrease
			$_SESSION ['shoppingCart'] [$pid] --;
			if ($_SESSION ['shoppingCart'] [$pid] == 0) {
				unset ( $_SESSION ['shoppingCart'] [$pid] );
			}
		}
	}
}

function getChart() {
	
	$myProducts = $_SESSION ['shoppingCart'];
	
	$html = "<div id='shoppingChart' >";
	$html .= getProductList($myProducts);
	$html .= "<form method='post' action='checkout.php'><input id='checkout' type='submit' value='checkout'/></form>";
	$html .= "</div>";
	
	return $html;
}

function getProductList($productList){
	
	$html = "<table id='productTable'>";
	$html .= "<tr><th>".$_SESSION['text']['product']."</th>";
	$html .= "<th>".$_SESSION['text']['price']."</th>";
	$html .= "<th>".$_SESSION['text']['number']."</th></tr>";
	
	$total = 0;
	foreach ( $productList as $id => $num ) {
		$total += ($num * $GLOBALS ['products'] [$id] ['price']);
		$html .= "<tr>";
		$html .= "<td>" . $GLOBALS ['products'] [$id] ['name'] . "</td>";
		$html .= "<td>" . $GLOBALS ['products'] [$id] ['price'] . " CHF</td>";
		$html .= "<td><form method='post'><input type='hidden' name='removeProductId' value='$id' />";
		$html .= "<input type='submit' class='removeItem' value='-'/></form></td>";
		$html .= "<td>$num</td>";
		$html .= "<td><form method='post'><input type='hidden' name='productId' value='$id'/>";
		$html .= "<input type='submit' class='removeItem' value='+'/></form></td>";
		$html .= "<tr>";
		$html .= "</tr>";
	}
	
	$html .= "<tr class='bold'><td>Total</td><td>$total CHF</td></tr>";
	$html .= "</table>";
	return $html;
}

function getProductListFinal($productList){
	$html = "<table id='productTable'>";
	$html .= "<tr><th>".$_SESSION['text']['product']."</th>";
	$html .= "<th>".$_SESSION['text']['price']."</th>";
	$html .= "<th colspan='3'>".$_SESSION['text']['number']."</th></tr>";
	foreach ( $productList as $id => $num ) {
		$html .= "<tr>";
		$html .= "<td>" . $GLOBALS ['products'] [$id] ['name'] . "</td>";
		$html .= "<td>" . $GLOBALS ['products'] [$id] ['price'] . " CHF</td>";
		$html .= "<td>$num</td>";
		$html .= "<tr>";
		$html .= "</tr>";
	}
	$html .= "</table>";
	return $html;
	
	
}

?>