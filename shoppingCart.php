<?php
require_once 'productArray.php';
function getChart() {
	if (! isset ( $_SESSION ['shoppingChart'] )) {
		$_SESSION ['shoppingChart'] = array ();
	}
	
	if (isset ( $_POST ['productId'] )) {
		
		// get product id from request
		$pid = $_POST ['productId'];
		// valid product key?
		if (array_key_exists ( $pid, $GLOBALS ['products'] )) {
			// add or increase?
			if (array_key_exists ( $pid, $_SESSION ['shoppingChart'] )) {
				$_SESSION ['shoppingChart'] [$pid] ++;
			} else {
				$_SESSION ['shoppingChart'] [$pid] = 1;
			}
		}
	}
	
	if (isset ( $_POST ['removeProductId'] )) {
		// get product id from request
		$pid = $_POST ['removeProductId'];
		// valid product key?
		if (array_key_exists ( $pid, $GLOBALS ['products'] )) {
			// decrease
			$_SESSION ['shoppingChart'] [$pid] --;
			if ($_SESSION ['shoppingChart'] [$pid] == 0) {
				unset ( $_SESSION ['shoppingChart'] [$pid] );
			}
		}
	}
	
	$myProducts = $_SESSION ['shoppingChart'];
	
	$html = "<div id='shoppingChart' >";
	$html .= "<table>";
	$html .= "<tr><th>Produkt</th><th>Anz.</th></tr>";
	
	foreach ( $myProducts as $id => $num ) {
		$html .= "<tr>";
		$html .= "<td>" . $GLOBALS ['products'] [$id] ['name'] . "</td>";
		$html .= "<td><form method='post'><input type='hidden' name='removeProductId' value='$id' />";
		$html .= "<input type='submit' class='removeItem' value='-'/></form></td>";
		$html .= "<td>$num</td>";
		$html .= "<td><form method='post'><input type='hidden' name='productId' value='$id'/>";
		$html .= "<input type='submit' class='removeItem' value='+'/></form></td>";
		$html .= "<tr>";
		$html .= "</tr>";
	}
	
	$html .= "</table>";
	
	$html .= "<form method='post' action='checkout.php'><input id='checkout' type='submit' value='checkout'/></form>";
	
	$html .= "</div>";
	
	return $html;
}

?>