<?php
session_start();
if(isset($_COOKIE['login'])){
    header("location:dashboard.php");
}


?>



  <!DOCTYPE html>
  <html>

  <body>
    <p>
 <?php if (isset($_SESSION["notification"]))
{
    echo $_SESSION["notification"] ;
}?>
<form action="registratie-process.php" method="post">
    <input type="submit" name="session" value="verwijderen">
</form>
        <form action="registratie-process.php" method="post">
          e-mail:
          <br>
          <input type="text" name="email" value="<?php if (isset($_SESSION[ 'data' ]["email"])) {echo $_SESSION[ 'data' ]["email"]; }?>">
          <br> paswoord:
          <br>
          <input type="<?php if(isset($_SESSION[ 'data' ]["pasword"])){ echo "text ";} else{echo "password ";}?>" name="password" value="<?php if (isset($_SESSION[ 'data' ]["password"])) { echo $_SESSION[ 'data' ]["password"];}?>">
          <input type="submit" name="genereer" value="genereer een paswoord">
          <br>
          <br>
          <input type="submit" name="submit" value="register">
        </form>



  </body>

  </html>