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
	
	// get cart
	$myProducts = $_SESSION['shoppingCart'];
	
	// get pay params
	$payMethod = $_POST["payMethod"];
	$sex = $_POST["sex"];
	$name = $_POST["name"];
	$street = $_POST["street"];
	$zip = $_POST["zip"];
	$city = $_POST["city"];
	$mail = $_POST["mail"];
	
	$html = "<div class='checkout'>";
	$html .= "<p>Sie haben folgende Artikel bestellt:</p>";
	
	$html .= "<div class='borderFine' >";
	$html .= getProductListFinal($myProducts);
	$html .= "</div>";
	
	$html .=	"<p>Vielen Dank für Ihren Auftrag. Sie erhalten sobald wie möglich eine Bestätigung.</p>";
	$html .= <<<EOT
<table>
	<tr>
		<td>Zahlmethode</td>
		<td>$payMethod<td>
	</tr>
	<tr>
		<td>Anrede</td>
		<td>$sex</td>
	</tr>
	<tr>
		<td>Name/Vorname</td>
		<td>$name</td>
	</tr>
	<tr>
		<td>Strasse</td>
		<td>$street</td>
	</tr>
	<tr>
		<td>PLZ</td>
		<td>$zip</td>
	</tr>
	<tr>
		<td>Ort</td>
		<td>$city</td>
	</tr>
	<tr>
		<td>E-Mail</td>
		<td>$mail</td>
	</tr>
</table>
EOT;
	
	$html .= "<p><a href='index.php' >zurück zum Shop</a></p>";
	$html .= "</div>";
	
	echo $html;
	
	// empty cart
	unset($_SESSION['shoppingCart']);
	
	?>

	<div id="footer">Copyright &copy; lawnmower.ch</div>
</body>
</html>
