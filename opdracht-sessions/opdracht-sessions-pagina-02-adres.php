<?php 
$straat=$_POST['straat'];
$nummer=$_POST['nummer'];
$gemeente=$_POST['gemeente'];
$postcode=$_POST['postcode'];

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
$straat_v=$_SESSION['straat_v'];
$nummer_v=$_SESSION['nummer_v'];
$gemeente_v=$_SESSION['gemeente_v'];
$postcode_v=$_SESSION['postcode_v'];


?>
<html>
<body>

<form action="overzichtspagina.php" method="post">
straat: <input type="text" name="straat" value="
	<?php 
	if($straat_v==""){
		echo("0");
	}else{
		echo($straat_v);
	}
	

	?>
	"><br>
nummer: <input type="text" name="nummer" value="
	<?php 
	if($nummer_v==""){
		echo("0");
	}else{
		echo($nummer_v);
	}
	

	?>
	
	"><br>
gemeente: <input type="text" name="gemeente"  value="
	<?php 
	if($gemeente_v==""){
		echo("0");
	}else{
		echo($gemeente_v);
	}
	

	?>
	"><br>
postcode: <input type="text" name="postcode" value="
		<?php 
	if($postcode_v==""){
		echo("0");
	}else{
		echo($postcode_v);
	}
	

	?>
	"><br>
<input type="submit" name="verzenden" value="verzenden">
</form>

</body>
</html>