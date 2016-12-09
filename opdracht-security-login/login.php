<?php 
session_start();
 if (isset($_SESSION["notification"])) 
 {
 	$notification= $_SESSION["notification"];
 }
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Login</title>
 </head>
 <body>
 <p>
 <?= $notification ?>
 </p>
 	 <form action="login-process.php" method="post">
		<label for="email">E-mail</label><br>
        <input type="text" name="email"><br>
        <label for="password">password</label><br>
        <input type="password" name="password">
        <button type="submit" name="submit">Inloggen</button>
	</form>
	<p>Nog geen account? Maak er dan eentje aan op de  <a href="registratie-form.php">registratiepagina</a></p>
 </body>
 </html>