<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles.css">
<script type="text/javascript">
/* set cookie to identifier the user language */
function createCookie(value) {
	var date = new Date();
	date.setTime(date.getTime()+(1000*60*60*24));
	var lang = "lang=" + value + ";";
	var expires = "expires=" + date.toGMTString() + ";";
	document.cookie = lang + expires;
}
</script>
</head>
<body>

	<div>
		<a onclick=createCookie('de') href="">DE</a>
		<a onclick=createCookie('fr') href="">FR</a>
		<a onclick=createCookie('it') href="">IT</a>
		<a onclick=createCookie('en') href="">EN</a>
	</div>

	<div id="header">
		<h1 onclick="javascript:location.href='index.php'">The Lawnmower</h1>
	</div>

	<?php
	session_start ();
	
	require_once 'language.php';
	
	/* contains whole navigation as div */
	require_once 'navigation.php';
	echo getNavigation ();
	
	require_once 'shoppingCart.php';
	handleCart();
	echo getChart ();
	
	require_once 'products.php';
	echo getProducts ();
	
	?>

	<div id="footer">Copyright &copy; lawnmower.ch</div>
</body>
</html>
