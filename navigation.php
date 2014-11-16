<?php

// navigation enum
abstract class Place {
	const HOME = 'home';
	const GAS = 'gas';
	const ELECTRO = 'electro';
	const ROBOT = 'robot';
	const TRACTOR = 'tractor';
	const HAND = 'hand';
	const EQUIPMENT = 'equipment';
}

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
			$_SESSION[PLACE]=Place::HOME;
		}
	}
	
	// load navigation texts
	$navigation = array(
		Place::HOME => $_SESSION['text'][Place::HOME],
		Place::GAS => $_SESSION['text'][Place::GAS],
		Place::ELECTRO => $_SESSION['text'][Place::ELECTRO],
		Place::ROBOT => $_SESSION['text'][Place::ROBOT],
		Place::TRACTOR => $_SESSION['text'][Place::TRACTOR],
		Place::HAND => $_SESSION['text'][Place::HAND],
		Place::EQUIPMENT => $_SESSION['text'][Place::EQUIPMENT]
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
	$r = new ReflectionClass("Place");
	$c = $r -> getConstants();
	return in_array($var,$c);
}

?>