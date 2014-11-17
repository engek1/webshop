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
	
	$myProducts = $_SESSION['shoppingCart'];
	
	$html = "<div class='checkout'>";
	$html .= "<p>Sie haben folgende Artikel bestellt:</p>";
	
	$html .= "<div class='borderFine' >";
	$html .= getProductListFinal($myProducts);
	$html .= "</div>";
	
	$html .=	"<p>Vielen Dank für Ihren Auftrag. Sie erhalten sobald wie möglich eine Bestätigung.</p>";
	$html .= "<p><a href='index.php' >zurück zum Shop</a></p>";
	$html .= "</div>";
	
	echo $html;
	
	unset($_SESSION['shoppingCart']);
	?>
	
		

	<div id="footer">Copyright &copy; lawnmower.ch</div>
</body>
</html>
