<?php 

session_start();

$straat_v=$_SESSION['straat_v'];
$nummer_v=$_SESSION['nummer_v'];
$gemeente_v=$_SESSION['gemeente_v'];
$postcode_v=$_SESSION['postcode_v'];

if(isset($_POST['verzenden'])){
	if(empty($straat) and empty($nummer) and empty($gemeente) and empty($postcode)){
		 $message='vul de input in aub';
	}else{
		$_SESSION['straat_v']=$straat;
		$_SESSION['nummer_v']=$nummer;
		$_SESSION['gemeente_v']=$gemeente;
		$_SESSION['postcode_v']=$nummer;
	}
}
 
?>
<html>
<head>

<script language="javascript">
function setFocus()
{	
	var field = document.getElementById(getParameterByName('edit')).focus();
	field.focus();
}

function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
</script>

</head>
<body onload="setFocus()">

<form action="overzichtspagina.php" method="post">
straat: <input type="text" id="straat" name="straat" value="<?php 
	if($straat_v==''){
		echo("Leeg");
	}else{
		echo($straat_v);
	}
	

	?>
	"><br>
nummer: <input type="text" id="nummer" name="nummer" value="<?php 
	if($nummer_v==""){
		echo("Leeg");
	}else{
		echo($nummer_v);
	}
	

	?>
	
	"><br>
gemeente: <input type="text" id="gemeente" name="gemeente"  value="<?php 
	if($gemeente_v==""){
		echo("Leeg");
	}else{
		echo($gemeente_v);
	}
	

	?>
	"><br>
postcode: <input type="text" id="postcode" name="postcode" value="<?php 
	if($postcode_v==""){
		echo("Leeg");
	}else{
		echo($postcode_v);
	}
	

	?>
	"><br>
<input type="submit" name="verzenden" value="verzenden">
</form>

</body>
</html>