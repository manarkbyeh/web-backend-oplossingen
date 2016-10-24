<?php 
	session_start();
$message='';

$Name=$_POST['name'];
$nick_name=$_POST['nickename'];
if(isset($_POST['verzenden'])){
	if(empty($Name) and empty($nick_name)){
		 $message='vul de veld in';
	}else{
		$_SESSION['name']=$Name;
		$_SESSION['nickename']=$nick_name;
	}
}
$name=$_SESSION['name'];
$Nicke_name=$_SESSION['nickename'];


?>


<html>
<body>
<h>Deel 1: registratiegegevens</h>
<form action="opdracht-sessions-pagina-02-adres.php" method="post">
Name: <input type="email" name="name"><br>
Nickename: <input type="text" name="nickename"><br>
<input type="submit" value="verzenden" name="verzenden">
</form>
<?php echo $message ?>
	<?php echo $name ?><?php echo $Nicke_name ?>
</body>
</html>