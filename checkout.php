<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles.css">
<script type="text/javascript">
function ensure() {

	var name = document.forms["submitForm"]["name"];
	var street = document.forms["submitForm"]["street"];
	var zip = document.forms["submitForm"]["zip"];
	var city = document.forms["submitForm"]["city"];
	var mail = document.forms["submitForm"]["mail"];

	// validate fields
	var isValid = true;
	isValid = validate(name);
	isValid = validate(street);
	isValid = validate(zip);
	isValid = validate(city);
	isValid = validate(mail);
    if (!isValid){
        window.alert("Bitte korrigieren sie ihre Eingabe.");
        return false;
    }

    // validate email
	isValid = validateMail(mail);
	if(!isValid){
		 alert("Not a valid e-mail address");
        return false;
	}

	// ask for confirmation
	var r = window.confirm("Sind sie sicher?");
	if(r==false){
		return false;
	}
	// submit
	document.getElementById("submitForm").submit();
}

function validate(inputField){
	var val = inputField.value;
	if (val == null || val == "") {
		inputField.style.borderColor = "#ff0000";
        return ;
	}else{
		inputField.style.borderColor = "rgb(238,238,238)";
		return true;
	}
}

function validateMail(inputField) {
    var mail = inputField.value;

	if(mail.match("^([a-zA-Z0-9._-]+)@([a-zA-Z0-9._-]+)\.([a-zA-z]{2,4})$")){
		inputField.style.borderColor = "rgb(238,238,238)";
        return true;
	} else {
		inputField.style.borderColor = "#ff0000";
    	return false;;
	}
    
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
    	inputField.style.borderColor = "#ff0000";
    	return false;
    }else{
    	inputField.style.borderColor = "rgb(238,238,238)";
        return true;
    }
}

</script>
</head>
<body>

	<div id="header">
		<h1 onclick="javascript:location.href='index.php'">The Lawnmower</h1>
	</div>


	<p class='back'>
		<a href='index.php'>Zurück</a>
	</p>
	<div class='checkout'>
	
	<?php
	session_start();
	
	require_once 'language.php';
	require_once 'shoppingCart.php';
	
	handleCart();
	
	$myProducts = $_SESSION['shoppingCart'];

	echo getProductList($myProducts);
	
	?>
	
		<form id="submitForm" method="post" action="pay.php">
			<p>Mit dem Drücken auf Abschliessen bestätigen sie die Bestellung.</p>

			<table>
				<tr>
					<td>Zahlmethode</td>
					<td><select name='payMethod' size='1'>
							<option>Creditcard</option>
							<option>Debitcard</option>
							<option>E-Finance</option>
							<option>Rechnung</option>
							<option>Vorauszahlung</option>
					</select>
					
					<td>
				
				</tr>

				<tr>
					<td>Anrede</td>
					<td><select name='sex' size='1'>
							<option>Frau</option>
							<option>Herr</option>
					</select></td>
				</tr>
				<tr>
					<td>Name/Vorname*</td>
					<td><input type="text" name="name" /></td>
				</tr>
				<tr>
					<td>Strasse*</td>
					<td><input type="text" name="street" /></td>
				</tr>
				<tr>
					<td>PLZ*</td>
					<td><input type="text" name="zip" /></td>
				</tr>
				<tr>
					<td>Ort*</td>
					<td><input type="text" name="city" /></td>
				</tr>
				<tr>
					<td>E-Mail*</td>
					<td><input type="text" name="mail" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="button" value='Abschliessen'
						onclick="ensure()" /></td>
				</tr>
			</table>

		</form>

	</div>

	<div id="footer">Copyright &copy; lawnmower.ch</div>
</body>
</html>
