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



?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<p><?= $_SESSION['straat_v']; ?><a href="opdracht-sessions-pagina-02-adres.php?edit=straat">wijzig</a></p>
	<p><?= $_SESSION['nummer_v'];  ?><a href="opdracht-sessions-pagina-02-adres.php?edit=nummer">wijzig</a> </p>
	<p><?= $_SESSION['gemeente_v']; ?><a href="opdracht-sessions-pagina-02-adres.php?edit=gemeente">wijzig</a></p>
	<p><?= $_SESSION['postcode_v']; ?><a href="opdracht-sessions-pagina-02-adres.php?edit=postcode">wijzig</a></p>


</body>
</html>