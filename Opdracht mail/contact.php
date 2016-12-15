<?php
session_start();
$email = $_POST['email'];
$message = $_POST['message'];
if(isset( $_POST['checkbox'])){
    $_SESSION['checkbox']=true;
}
$_SESSION['email']=$email;
$_SESSION['message']=$message;
if(isset($_POST['submit'])){
    if(isset($_POST['email'])){
        if(isset($_POST['message'])){
            
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                try{
   $connect = new PDO('mysql:host=localhost;dbname=mailopdracht', 'root', 'root',array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }catch ( PDOException $e )
{
    $messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
}
                
             
                $admin="manar.kbyeh@student.kdg.be";
                
                $sql= "INSERT INTO contact_messages (email, message)
                VALUES (:email,:message)";
                
                $statement =$connect->prepare($sql);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':message',  $message);
                $check=   $statement->execute();
                $headers = "From: " . strip_tags($email) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($admin) . "\r\n";
                if(isset($_SESSION['checkbox'])){
                    $headers .= "CC:".$email."\r\n";
                }
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $message .="<p>$message</p>";
                $message .= "</br></br></br></br></br></br></br></br></br>From : $email ";
                
                if(mail($admin, "Reclame", $message,$headers)){
                    $_SESSION["notification"]="is gestuurd !";
                    header("Location: contact-form.php");
                    exit();
                }else{
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