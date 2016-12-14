<?php 
session_start();
if (isset($_COOKIE['login']))
{
    $my_data=explode(",",$_COOKIE["login"]);
    $my_array_email =  $my_data[0];
    $my_array_hash =  $my_data[1];
    
    
    
  
        
        $connect = new PDO('mysql:host=localhost;dbname=oplossing_file_upload', 'root', 'root', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     
 
    $sql= "SELECT * FROM users
    WHERE email = :email";
    $statement =    $connect->prepare($sql);
    $statement->bindValue(":email",  $my_array_email);
    $statement->execute();
    
    
    
    $row = $statement->fetch();
    $row_gebruiker=$row[4];
   
  

}else{
    $_SESSION["notification"]="je bent nog niet ingelogt";
    
   header("Location: login.php");
    exit();
    
}
    if (isset($_SESSION["notification"]))
    {
        $notification= $_SESSION["notification"] ;
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

  <p>
        <?= $notification ?>

    </p>
<p><a href="dashboard.php"> Terug naar dashboard </a>Ingelogd als <?=  $my_array_email ?>   <a href="login.php">uitloggen</a> </p>
<form action="gegevens-bewerken.php" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="pic">
            
                    <img src="<?=  $row_gebruiker ?>" width="150" height="150" alt="photo de profil">
                </label>

                <input type="file"  name="pic">
            </li>
                <li>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"  value="<?=  $my_array_email ?>">
        </li>
        </ul>
        <input type="submit" value="Wijzigen" name="submit">
    </form>

</body>
</html>




