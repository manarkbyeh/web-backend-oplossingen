<?php

session_start();

$email		=	$_SESSION[ 'data' ][ 'email' ];
$password	=	$_SESSION[ 'data' ][ 'password' ];
if (isset($_POST['genereer'])) {
    $_SESSION[ 'data' ][ 'email' ]= $_POST['email'];
    $_SESSION[ 'data' ][ 'password' ] = generatePassword(8);
    header("Location: registratie-form.php");
    exit();
    
}


if (isset($_POST["submit"]))
{
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    
        
        
    
            
            $connect = new PDO('mysql:host=localhost;dbname=opdrachtsecuritylogin', 'root', 'root',array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = "SELECT email FROM users WHERE email = :email";
            $statement =$connect->prepare($sql);
            $statement->bindValue(':email', $email);
            $check=   $statement->execute();
            $row = $statement->fetch();
            if($row==false){
                
                $sql2 = "INSERT INTO users(email, salt, password, lastlogin)
                VALUES
                ( :email, :salt, :password, NOW() )";
                $statement_u =  $connect->prepare($sql2);
                $salt = uniqid(mt_rand(), true);
               $salt_password= $password . $salt;
                $hash = hash('sha512',  $salt_password);
                var_dump( $hash );
                $statement_u->bindValue(':email', $email);
                $statement_u->bindValue(':salt', $salt);
                $statement_u->bindValue(':password', $hash);
                $check_u=  $statement_u->execute();
                var_dump( $_POST );
                
                
                
                if(  $check_u){
                    
                $email_hash = $email . $salt;
                $email_hash = hash('sha512', $email_hash);
                    setcookie('login', $email . ',' . $email_hash, time() + 2592000);
                    
                    header('location:dashboard.php');
                }	else
                {
                    $_SESSION["notification"]="er iets fout gegaan!";
                    header("Location: registratie-form.php");
                    exit();
                }
                
                
                
            }else{
                $_SESSION["notification"]="deze email bestaat al";
                header("Location: login.php");
                exit();
            }
     
        
        
        
    }else
    {
        $_SESSION["notification"]="een foute email adres";
        header("Location: registratie-form.php");
        exit();
    }
    
    
}
    
    
    
    function generatePassword($length) {
        $pull = [];
        while (count($pull) < $length) {
            $pull = array_merge($pull, range(0, 9), range('a', 'z'), range('A', 'Z'));
        }
        shuffle($pull);
        return substr(implode($pull), 0, $length);
    }
    ?>