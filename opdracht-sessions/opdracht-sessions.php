<?php
session_start();
print_r(@$_SESSION['data']);

if(isset($_GET['action']) && $_GET['action'] == "reset"){
    session_destroy();
    header("location :opdracht-sessions.php");
    exit();
}

$email ="";
$name = "";

if(isset($_GET['focus'])):
  $focus = $_GET['focus'];
    if($focus == "email")
      $email ="autofocus";
      else if($focus == "name")
       $name ="autofocus";
endif;
?>


  <html>

  <body>
    <h>Deel 1: registratiegegevens</h></br>
    <a href="opdracht-sessions.php?action=reset">Reset sessie voor testdoeleinden.</a><br>
    <form action="opdracht-sessions-pagina-02-adres.php" method="post">
      email:
      <input type="text" name="email" value="<?php echo @$_SESSION['data']['deel1']['email']; ?>" <?php echo @$email; ?> />
      <br> Nickename:
      <input type="text" name="name" value="<?php echo @$_SESSION['data']['deel1']['name']; ?>" <?php echo @$name ?> />
      <br>
      <input type="submit" value="verzenden" name="verzenden">
    </form>
  </body>

  </html>