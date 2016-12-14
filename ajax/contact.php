<?php
if(isset($_POST['email'])){
    if(isset($_POST['message'])){
        
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            
            $connect = new PDO('mysql:host=localhost;dbname=mail', 'root', 'root',array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $admin="manar.kbyeh@student.kdg.be";
            
            
            $sql= "INSERT INTO contact_messages (email, message)
            VALUES (:email,:message)";
            $email =  $_POST['email'];
            $message = $_POST['message'];
            $statement =$connect->prepare($sql);
            $statement->bindValue(':email',$email);
            $statement->bindValue(':message',$message);
            $check=   $statement->execute();
            $headers = "From: " . strip_tags($email) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($admin) . "\r\n";
            if(isset($_POST['checkbox'])){
                $headers .= "CC:".$email."\r\n";
            }
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message .="<p>$message</p>";
            $message .= "</br></br></br></br></br></br></br></br></br>From : $email ";
            
            if(mail($admin, "Reclame", $message,$headers)){
                echo "is gestuurd !";
            }else{
                echo "vul de gevevens juist!";
                
            }
        }else{
            echo "vul een juiste email adres in !";
        }
    }else{
        echo "vul de message veld in!";
    }
    
}else{
    echo "vul de email veld in!";
}
?>