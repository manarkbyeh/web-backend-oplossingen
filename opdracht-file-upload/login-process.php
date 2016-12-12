 <?php
session_start();
if(isset($_COOKIE['login'])){

  
}


if (isset($_POST["submit"]))
{
    $connect = new PDO('mysql:host=localhost;dbname=oplossing_file_upload', 'root', 'root', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $message	=	'Connectie dmv PDO geslaagd.';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT  email,salt,password FROM users WHERE email = :email";
    $statement =$connect->prepare($sql);
    $statement->bindValue(':email', $email);
    var_dump($_POST);
    $check= $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    
    if($check!=0){
        $password_check=hash( 'sha512',  $password . $row["salt"]);
        var_dump($password_check);
        var_dump( $row);
        if( $password_check==$row["password"]){
            setcookie("login", $email.",".$row["password"].$row["salt"], time() + 2592000);
            
              header("Location: dashboard.php");
                exit();
        }
        else
        {
            $_SESSION["notification"]="check uw email of uw wachtwoord nog een keer";
              header("Location: login.php");
                exit();
        }
        
    }    else
    {
        $_SESSION["notification"]="dat email bestaat  niet in onze database";
          header("Location: login.php");
                exit();
    }
    
    
    
    
    
}
?>