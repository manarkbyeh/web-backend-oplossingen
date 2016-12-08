<?php
session_start();

if (isset($_COOKIE['login']))
{
    $my_data=explode(",",$_COOKIE["login"]);
    $my_array_email =  $my_data[0];
    $my_array_hash =  $my_data[1];
    
    
    
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
    $statement->bindValue(":email",  $my_array_email);
    $statement->execute();
    
    
    
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    
    $salt =$row['salt'];
    $salt_email = hash('sha512',    $my_array_email . $salt);
    if ($salt_email ==   $my_array_hash) {
        
    }else{
        setcookie('login', "", 1);
        setcookie('login', false);
        unset($_COOKIE['login']);
    }
}else{
    $_SESSION["notification"]="je bent nog niet ingelogt";
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