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

if(isset($_COOKIE['lang'])){
	$lang = $_COOKIE['lang'];
	if($lang=='de' || $lang=='fr' || $lang=='it' || $lang=='en'){
		if($_SESSION['lang']!=$lang){
			$_SESSION['text']=loadText("languages/$lang.lang");
			$_SESSION['lang'] = $lang;
		}
	}
}else {
	$t = time()+60*60*24; // expires in 1 day
	setcookie('lang', 'de', $t);
	$_SESSION['lang'] = 'de';
	$_SESSION['text']=loadText("languages/de.lang");
}

?>