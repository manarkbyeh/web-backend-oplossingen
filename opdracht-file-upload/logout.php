<?php
session_start();

if(isset($_COOKIE['login'])) {
    //  $_SESSION["notification"]='U bent uitgelogd.Tot de volgende keer';
    // setcookie('login', "", 1);
    // setcookie('login', false);
    // unset($_COOKIE['login']);
    
   
    
}else{
    header("location:login.php");
}
?>
  <!DOCTYPE html>
  <html>

  <body>
    <p>
     <?= $_SESSION["notification"] ?>
</p>
	<form action="login.php" method="POST">
						<input type="submit" name="logout" value="inloggen" >
					</form>
     


  </body>

  </html>