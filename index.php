<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>


<?php
session_start ();

require_once 'language.php';
require_once 'navigation.php';
require_once 'shoppingCart.php';
require_once 'products.php';

$body = getNavigation();
handleCart();
$body .= getChart ();
$body .= getProducts ();

$templ = file_get_contents('templ.html');
$templ = str_replace('${title}', "Lawnmower", $templ);
$templ = str_replace('${style}', "style.css", $templ);
$templ = str_replace('${script}', "", $templ);
$templ = str_replace('${body}', $body, $templ);

echo $templ;
?>

