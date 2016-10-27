<?php

session_start();

if(isset($_GET['action']) && $_GET['action'] == "reset"){
    session_destroy();
    header("location : opdracht-sessions-pagina-02-adres.php.php");
    exit();
}



If(isset($_POST['verzenden'])){
    $_SESSION['data']['deel1']['name'] = @$_POST['name'];
    $_SESSION['data']['deel1']['email'] = @$_POST['email'];  
}


$straat = "";
$nummer ="";
$gemeente="";
$postcode="";

print_r(@$_SESSION['data']);

if(isset($_GET['focus'])){
    switch ($_GET['focus']) {
        
        case 'straat':
            $straat="autofocus";
            break;
        case 'nummer':
            $nummer="autofocus";
            break;
        case 'gemeente':
            $gemeente="autofocus";
            break;
        case 'postcode':
            $postcode="autofocus";
    }
}
?>
  <html>

  <head>


  </head>

  <body>
    </br>
    <a href="opdracht-sessions-pagina-02-adres.php?action=reset">Reset sessie voor testdoeleinden.</a>
    <br>
    <form action="overzichtspagina.php" method="post">
      straat:
      <input type="text" id="straat" name="straat" value="<?php  echo @$_SESSION['data']['deel2']['straat']; ?>" <?=@ $straat; ?> />
      <br> nummer:
      <input type="text" id="nummer" name="nummer" value="<?php  echo @$_SESSION['data']['deel2']['nummer']; ?>" <?=@ $nummer; ?> />
      <br> gemeente:
      <input type="text" id="gemeente" name="gemeente" value="<?php  echo @$_SESSION['data']['deel2']['gemeente']; ?>" <?=@ $gemeente; ?> />
      <br> postcode:
      <input type="text" id="postcode" name="postcode" value="<?php  echo @$_SESSION['data']['deel2']['postcode']; ?>" <?=@ $postcode; ?> />
      <br>
      <input type="submit" name="verzenden" value="verzenden">
    </form>
  </body>

  </html>