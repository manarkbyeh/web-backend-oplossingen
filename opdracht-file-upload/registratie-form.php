<?php
session_start();
if(isset($_COOKIE['login'])){
    header("location:dashboard.php");
}
if (isset($_SESSION["notification"]))
{
   $notification= $_SESSION["notification"] ;
}

?>



  <!DOCTYPE html>
  <html>

  <body>
    <p>
     <?= $notification ?>
</p>

        <form action="registratie-process.php" method="post">
          e-mail:
          <br>
          <input type="text" name="email" value="<?= (isset($_SESSION[ 'data' ]["email"]))?$_SESSION[ 'data' ]["email"]:"" ?>">
          <br> paswoord:
          <br>
          <input type="<?php $_SESSION[ 'data' ]["pasword"]? "text" : "password"?>" name="password" value="<?= (isset($_SESSION[ 'data' ]["password"]))?$_SESSION[ 'data' ]["password"]:"" ?>">
          <input type="submit" name="genereer" value="wil je uw password genereren ">
          <br>
          <br>
          <input type="submit" name="submit" value="register">
        </form>



  </body>

  </html>