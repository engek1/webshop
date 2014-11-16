<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div>
		<a href="?lang=de">DE</a>
		<a href="?lang=fr">FR</a>
		<a href="?lang=it">IT</a>
		<a href="?lang=en">EN</a>
	</div>

	<div id="header">
		<h1>The Lawnmower</h1>
	</div>

	<?php 
	session_start();
	
	require_once 'language.php';
	
	/* contains whole navigation as div */
	require_once 'navigation.php'; 
	echo getNavigation();
	
	require_once 'shoppingCart.php';
	echo getChart();
	
	require_once 'products.php';
	echo getProducts();
	
	?>

	<div id="footer">Copyright &copy; lawnmower.ch</div>
</body>
</html>
