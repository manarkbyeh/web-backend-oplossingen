<?php 
session_start();
if (isset($_COOKIE["login"])) 
{
		header("Location: dashboard.php"); /* Redirect browser */
		exit();
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Login</title>
 </head>
 <body>
 <p><?php if (isset($_SESSION["notification"])) 
 {
 	echo $_SESSION["notification"];
 }
 ?>
 </p>
 	 <form action="login-process.php" method="post">
		<label for="email">E-mail</label><br>
        <input type="text" name="email"><br>
        <label for="password">Wachtwoord</label><br>
        <input type="password" name="wachtwoord">
        <button type="submit" name="submit">Inloggen!</button>
	</form>
	<p>Nog geen account? <a href="registratie-form.php">registratiepagina</a></p>
 </body>
 </html>