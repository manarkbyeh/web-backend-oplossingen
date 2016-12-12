<?php
session_start();
$email = $_POST['email'];
$message = $_POST['message'];
$checkbox=  $_POST['checkbox'];
$_SESSION['email']=$email;
$_SESSION['message']=$message;
$_SESSION['checkbox']=$checkbox;


if(isset($_POST['submit'])){
    if(isset($_POST['email'])){
        if(isset($_POST['message'])){
            
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                
                $connect = new PDO('mysql:host=localhost;dbname=mail', 'root', 'root',array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $admin="manar.kbyeh@student.kdg.be";
                
                $sql= "INSERT INTO contact_messages (email, message)
                VALUES (:email,:message)";
                
                $statement =$connect->prepare($sql);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':message',  $message);
                $check=   $statement->execute();
                if($checkbox){
              
                    $subject = 'the subject';
                    
                    $headers = 'From:' .$admin. "\r\n";
                    
                    mail(  $email, $subject, $message,$headers   );
                    $_SESSION["notification"]="is gestuurd !";
                    header("Location: contact-form.php");
                    exit();
                }else{
                        $subject = 'the subject';
                    
                    $headers = 'From:' .$admin. "\r\n";
                    
                    mail(  $subject, $message,$headers   );
                    $_SESSION["notification"]="is gestuurd !";
                    header("Location: contact-form.php");
                    exit();
                }
                
                unset($_SESSION['email']); // will delete just the name data session_destroy(); // will delete ALL data associated with that user.
                
                unset($_SESSION['message']);
                unset($_SESSION['checkbox']);
                
                
                
            }else{
                $_SESSION["notification"]="vul een juiste email adres in !";
                header("Location: contact-form.php");
                exit();
                
                
                
            }
        }else{
            $_SESSION["notification"]="vul de message veld in!";
            header("Location: contact-form.php");
            exit();
        }
        
    }else{
        $_SESSION["notification"]="vul de email veld in!";
        header("Location: contact-form.php");
        exit();
    }
}
?>