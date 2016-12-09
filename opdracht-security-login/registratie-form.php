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
          <input type="text" name="email" value="<?= $_SESSION[ 'data' ]["email"] ?>">
          <br> paswoord:
          <br>
          <input type="<?php $_SESSION[ 'data' ]["pasword"]? "text" : "password"?>" name="password" value="<?= $_SESSION[ 'data' ]["password"] ?>">
          <input type="submit" name="genereer" value="genereer een paswoord">
          <br>
          <br>
          <input type="submit" name="submit" value="register">
        </form>



  </body>

  </html>