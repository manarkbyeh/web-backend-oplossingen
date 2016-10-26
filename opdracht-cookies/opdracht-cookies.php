<?php

$bestand	= file_get_contents('opdracht-cookies.txt');
$bestand_array=explode(",",$bestand);
$login  = $bestand_array[0];
$password =  $bestand_array[1];
$msg='';

if(isset($_COOKIE["manar"])){
		$n = $_COOKIE["manar"];
		$msg = "dag ".$n; 
}

if(isset($_POST['name']) && isset($_POST['password'])){
	$name=$_POST['name'];
	$pass=$_POST['password'];
	if($login == $name && $password == $pass){
		setcookie("manar", $name, time() + (60*60*6));
		$msg = "dag ".$name; 
	}
}else if(isset($_GET['logout'])){
   setcookie("manar", "", time() - (360*6));
   header("location: opdracht-cookies.php");
}


?>
<html>
<body>
<h1>Inloggen</h1>
<?php  if($msg == ''):?>
<form action="opdracht-cookies.php" method="post">
Name: <input type="text" name="name" ><br>
password: <input type="password" name="password"><br>
<input type="submit" value="verzenden" name="verzenden">
</form>
<?php else: 
	echo $msg;
?>
<a href="?logout=true">Uitloggen</a> 
<?php endif; ?>
</body>
</html>