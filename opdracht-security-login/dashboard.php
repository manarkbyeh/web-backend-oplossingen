<?php
session_start();

if (isset($_COOKIE['login']))
{
    $my_data=explode(",",$_COOKIE["login"]);
    $my_array_email =  $my_data[0];
    $my_array_hash =  $my_data[1];
    
    
    
  
        
        $connect = new PDO('mysql:host=localhost;dbname=opdrachtsecuritylogin', 'root', 'root', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     
 
    $sql= "SELECT salt FROM users
    WHERE email = :email";
    $statement =    $connect->prepare($sql);
    $statement->bindValue(":email",  $my_array_email);
    $statement->execute();
    
    
    
    $row = $statement->fetch();
    
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

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
  </head>

  <body>
	<form action="logout.php" method="POST">
						<input type="submit" name="logout" value="Uitloggen" >
					</form>

  

  </body>

  </html>