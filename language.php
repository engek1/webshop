<?php

/* return all texts from file */
function loadText($filename){
	$text=array();
	$file = file($filename); // $file is an array line after line
	foreach($file as $line){
		$pair = explode('=', $line); // split the line by char "=" in key and value 
		$key=trim($pair[0]); // remove white-spaces and store the key
		$val=trim($pair[1]); // remove white-spaces and store the value
		$text[$key] = $val; // add the key and value in the array 
	}
	return $text;
}


if( isset($_GET['lang']) ){
	$lang=$_GET['lang'];
	if($lang=='de' || $lang=='fr' || $lang=='it' || $lang=='en'){
		$_SESSION['text']=loadText("languages/$lang.lang");
	}
} else {
	if (!isset($_SESSION['text'])){
		$_SESSION['text']=loadText('languages/de.lang');
	}
}

?>