<?php 

session_start();

if(isset($_GET['action'])){
	if ($_GET['action'] == "reset"){
		session_destroy();
		session_start();

		$_SESSION['straat_v']="Leeg";
		$_SESSION['nummer_v']="Leeg";
		$_SESSION['gemeente_v']="Leeg";
		$_SESSION['postcode_v']="Leeg";
	}
}


if(isset($_POST['straat'])){
	$straat=$_POST['straat'];
	$nummer=$_POST['nummer'];
	$gemeente=$_POST['gemeente'];
	$postcode=$_POST['postcode'];
	
} else {
	$straat="Leeg";
	$nummer="Leeg";
	$gemeente="Leeg";
	$postcode="Leeg";
}

if(isset($_POST['verzenden'])){
	if(empty($straat) and empty($nummer) and empty($gemeente) and empty($postcode)){
		 $message='vul de input in aub';
	}else{
		
		$_SESSION['straat_v']=$straat;
		$_SESSION['nummer_v']=$nummer;
		$_SESSION['gemeente_v']=$gemeente;
		$_SESSION['postcode_v']=$postcode;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<p><?= $_SESSION['straat_v']; ?>&nbsp;<a href="opdracht-sessions-pagina-02-adres.php?edit=straat">wijzig</a></p>
	<p><?= $_SESSION['nummer_v'];  ?>&nbsp;<a href="opdracht-sessions-pagina-02-adres.php?edit=nummer">wijzig</a> </p>
	<p><?= $_SESSION['gemeente_v']; ?>&nbsp;<a href="opdracht-sessions-pagina-02-adres.php?edit=gemeente">wijzig</a></p>
	<p><?= $_SESSION['postcode_v']; ?>&nbsp;<a href="opdracht-sessions-pagina-02-adres.php?edit=postcode">wijzig</a></p>
	<br>
	<p><a href="http://oplossingen.web-backend.local/opdracht-sessions/overzichtspagina.php?action=reset">Reset sessie voor testdoeleinden.</a></p>

</body>
</html>