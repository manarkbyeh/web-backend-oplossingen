<?php

session_start();
print_r(@$_SESSION['data']);
if(isset($_GET['action']) && $_GET['action'] == "reset"){
    session_destroy();
    header("location : overzichtpagina.php");
    exit();
}



$_SESSION['data']['deel2']['straat'] = @$_POST['straat'];
$_SESSION['data']['deel2']['nummer'] = @$_POST['nummer'];
$_SESSION['data']['deel2']['gemeente'] = @$_POST['gemeente'];
$_SESSION['data']['deel2']['postcode'] = @$_POST['postcode'];


?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Page Title</title>
  </head>

  <body>
    <p>
      <?= @$_SESSION['data']['deel1']['email']; ?>&nbsp;<br /><a href="opdracht-sessions.php?focus=email">wijzig</a></p>
    <p>
      <?= @$_SESSION['data']['deel1']['name'];  ?>&nbsp;<br /><a href="opdracht-sessions.php?focus=name">wijzig</a> </p>
    <p>
      <?= @$_SESSION['data']['deel2']['straat']; ?>&nbsp;<br /><a href="opdracht-sessions-pagina-02-adres.php?focus=straat">wijzig</a></p>
    <p>
      <?= @$_SESSION['data']['deel2']['nummer'];  ?>&nbsp;<br /><a href="opdracht-sessions-pagina-02-adres.php?focus=nummer">wijzig</a> </p>
    <p>
      <?= @$_SESSION['data']['deel2']['gemeente']; ?>&nbsp;<br /><a href="opdracht-sessions-pagina-02-adres.php?focus=gemeente">wijzig</a></p>
    <p>
      <?= @$_SESSION['data']['deel2']['postcode']; ?>&nbsp;<br /><a href="opdracht-sessions-pagina-02-adres.php?focus=postcode">wijzig</a></p>
    <br>
    <p><a href="overzichtspagina.php?action=reset">Reset sessie voor testdoeleinden.</a></p>

  </body>

  </html>