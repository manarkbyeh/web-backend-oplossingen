<?php
session_start();

if (isset($_COOKIE['login']))
{
    $my_data=explode(",",$_COOKIE["login"]);
    $my_array_data = array('email' => $my_data[0], 'hash' => $my_data[1]);
    
    
    try
    {
        
        $connect = new PDO('mysql:host=localhost;dbname=opdrachtsecuritylogin', 'root', 'root', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $message	=	'Connectie dmv PDO geslaagd.';
    }
    catch ( PDOException $e )
    {
        $message=	'Er ging iets mis: ' . $e->getMessage();
    }
    $sql= "SELECT salt FROM users
    WHERE email = :email";
    $statement =    $connect->prepare($sql);
    $statement->bindValue(":email", $my_array_data['email']);
    $statement->execute();
    
    $fetchAssoc = array();
    
    
    while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
    {
        $fetchAssoc[]	=	$row;
    }
    $salt = $fetchAssoc[0]['salt'];
    $salt_email = hash('sha512',   $my_array_data['email'] . $salt);
    if ($salt_email ==  $my_array_data['hash']) {
     
    }else{
        setcookie('login', "", 1);
        setcookie('login', false);
        unset($_COOKIE['login']);
    }
}else{
    $_SESSION["notification"]="je bent nog niet in gelogt";
    header("Location: login.php");
    exit();
    
}
if (isset($_GET["outlogin"]) && $_GET["outlogin"]=="true")
{
    
    setcookie("login", "", time() - 3600);
    $_SESSION["notification"]="u moet eerst inloggen" ;
    header("Location: login.php");
    exit();
    
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
  </head>

  <body>
 

      <a href="?outlogin=true">uitloggen</a>
 
  </body>

  </html>