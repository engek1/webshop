<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div id="header">
		<h1 onclick="javascript:location.href='index.php'">The Lawnmower</h1>
	</div>

	<?php
	session_start();
	
	require_once 'language.php';
	require_once 'shoppingCart.php';
	
	handleCart();
	
	$myProducts = $_SESSION['shoppingCart'];
	
	$html = "<p class='back'><a href='index.php' >Zurück</a></p>";
	
	$html .= "<div class='checkout'>";
	$html .= getProductList($myProducts);
	
	$html .= "<form action='pay.php'>";
	$html .= "<p>Mit dem Drücken auf Abschliessen bestätigen sie die Bestellung.</p>";
	
	$html .= "<select name='payMethod' size='1'>";
	$html .= "	<option>Creditcard</option>";
	$html .= "	<option>Debitcard</option>";
	$html .= "	<option>E-Finance</option>";
	$html .= "	<option>Rechnung</option>";
	$html .= "	<option>Vorauszahlung</option>";
	$html .= "</select>";
	
	$html .= "<input type='submit' value='Abschliessen' />";
	$html .= "</form>";
	
	$html .= "</div>";
	
	echo $html;
	
	?>
	
		

	<div id="footer">Copyright &copy; lawnmower.ch</div>
</body>
</html>
