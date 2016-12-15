<?php
session_start();
    
if (isset($_COOKIE['login']))
{
      //  var_dump($_COOKIE["login"]);
     //exit();
    $my_data=explode(",",$_COOKIE["login"]);
    $my_array_email =  $my_data[0];
    $my_array_hash =  $my_data[1];
    
    
    
  
        
        $connect = new PDO('mysql:host=localhost;dbname=oplossing_file_upload', 'root', 'root', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     
 
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
  
  </head>

  <body>
	<form action="logout.php" method="POST">
						<input type="submit" name="login" value="Uitloggen" >
					</form>

    <ul>
        <li><a href="">Artikels</a></li>
        <li><a href="gegevens-wijzigen-form.php">Gegevens wijzigen</a></li>
    </ul>
  

  </body>

  </html>