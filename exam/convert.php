<html>
<head>
<title>Temperature Converter</title>
</head>
<body>
	<pre>Enter either Fahrenheit or Celsius and click on Convert
<?php
class Values {
	public $c = null;
	public $f = null;
	function setC($c){
		$this->c = $c;
		$this->f = (9/5) * $c + 32;
		$this->save($this->c, $this->f);
	}
	function setF($f){
		$this->c = (5/9) * ($f -32);
		$this->f = $f;
		$this->save($this->c, $this->f);
	}
	function printen(){
		return $this->f." °f equals ". $this->c ." °c";
	}
	function save($c, $f){
		$db = new mysqli('localhost', 'test_user', 'test_user', 'test');
		$ps = $db->prepare("INSERT INTO temperature (time, celsius, fahrenheit) VALUES (CURRENT_TIMESTAMP,?,?)");
		$ps->bind_param("dd", $c, $f);
		$ps->execute();
		$ps->close();
		$db->close();
	}
}

$f = $c = "";
if(isset($_POST['f'])) $f = sanitizeString ( $_POST ['f'] );
if(isset($_POST['c'])) $c = sanitizeString ( $_POST ['c'] );
$values = new Values();
if ($f != '') {
	$values->setF($f);
	$out = $values->printen();
} elseif ($c != '') {
	$values->setC($c);
	$out = $values->printen();
} else{
	$out = "";}
$out = htmlentities($out);
echo "<b>$out</b>";

function sanitizeString($var) {
	$var = stripslashes ( $var );
	$var = htmlentities ( $var ); // remove html characters
	$var = strip_tags ( $var ); // remove html tags
	return $var;
}
?>
<form method="post" action="convert.php">
Fahrenheit <input type="text" name="f" size="7" />
Celsius <input type="text" name="c" size="7" />
<input type="submit" value="Convert" />
</form>
	</pre>
</body>
</html>