<?php 
session_start();
	if ( isset( $_SESSION[ 'data' ] ) )
	{
		$email		=	$_SESSION[ 'data' ][ 'email' ];
		$password	=	$_SESSION[ 'data' ][ 'password' ];
	}
?>



<!DOCTYPE html>
<html>
<body>

<form action="registratie-process.php">
   e-mail:<br>
  <input type="e-mail" name="e-mail " >
  <br>
  paswoord:<br>
  <input type="text" name="paswoord" ><input type="submit" value="genereer een paswoord">
  <br><br>
  <input type="submit" value="register">
</form> 



</body>
</html>