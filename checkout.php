<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div id="header">
		<h1>The Lawnmower</h1>
	</div>

	<?php
	session_start ();
	
	require_once 'language.php';
	
	require_once 'shoppingCart.php';
	echo getChart ();
	
	?>

	<div id="footer">Copyright &copy; lawnmower.ch</div>
</body>
</html>
