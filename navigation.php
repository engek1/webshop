<?php

// navigation enum
require_once 'oop/Category.php';

// navigation key for session and GET param
const PLACE = 'place';

/** return the dynamic navigation menu */
function getNavigation(){
	
	/* save place to session */
	if( isset($_GET[PLACE]) ){
		if( isPlace($_GET[PLACE]) ){
			$_SESSION[PLACE]=$_GET[PLACE];
		}
	}else{
		if(!isset($_SESSION[PLACE])){
			$_SESSION[PLACE]=Category::HOME;
		}
	}
	
	// load navigation texts
	$navigation = array(
		Category::HOME => $_SESSION['text'][Category::HOME],
		Category::GAS => $_SESSION['text'][Category::GAS],
		Category::ELECTRO => $_SESSION['text'][Category::ELECTRO],
		Category::ROBOT => $_SESSION['text'][Category::ROBOT],
		Category::TRACTOR => $_SESSION['text'][Category::TRACTOR],
		Category::HAND => $_SESSION['text'][Category::HAND],
		Category::EQUIPMENT => $_SESSION['text'][Category::EQUIPMENT]
	);

	$html = '<div id="nav">';
	$html .= '<ul>';
	
	foreach ($navigation as $index => $value) {
		if($index==$_SESSION[PLACE]){
			$html .= "<li class='active'><a href=\"?place=$index\">$value</a></li>";
		}else{
			$html .= "<li><a href=\"?place=$index\">$value</a></li>";
		}
		
	}
	
	$html .= '</ul>';
	$html .= '</div>';
	return $html;
	
}

/** checks if place is valid */
function isPlace($var){
	$r = new ReflectionClass("Category");
	$c = $r -> getConstants();
	return in_array($var,$c);
}

?>