<?php
session_start();
$is_valid=false;
$controle_code=8;


try{
    if(isset($_POST["submit"]))
    {
        if(isset($_POST["code"]))
        {
            if(strlen($_POST["code"]) == $controle_code)
            {
                $is_valid = true;
            }
            else
            {
                throw new Exception ("VALIDATION-CODE-LENGTH");
            }
        }
        else
        {
            throw new Exception ("SUBMIT-ERROR");
        }
    }
}
catch(Exception $e){
    $messageCode=$e->getMessage();
    $message = array();
    $createMessage = false;
    
    switch ($messageCode) {
        
        case 'SUBMIT-ERROR':
            
            $message['type'] = 'error';
            $message['text'] = "Er werd met het formulier geknoeid";
            break;
        case 'VALIDATION-CODE-LENGTH':
            $message['type'] = 'error';
            $message['text'] = "De kortingscode heeft niet de juiste lengte \n";
            $createMessage = true;
            break;
        default:
            
            break;
}
logToFile(  $message);
if(  $createMessage==true){
    createMessage($message);
    
    
}
$message_error =showMessage();
}


function createMessage($message){
    $_SESSION["message"]["type"] = $message["type"];
    $_SESSION["message"]["text"] = $message["text"];
}
function logToFile(  $message){
    
    $log_file = array();
    
    $log_file['date'] 		= '[' . date("H:i:s d/m/Y") . ']';
    $log_file['IP']	= $_SERVER['REMOTE_ADDR'];
    $log_file['Error_type']	=  $message['type'];
    $log_file['Error_text']	=  $message['text'];
    $log_file['NewLine']		= "\n";
    $log_message = implode(' ',   $log_file);
    file_put_contents('log.txt',   $log_message , FILE_APPEND);
}
function showMessage(){
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        unset( $_SESSION[ 'message' ] );
        return $message;
    }
    else {
        $message = false;
    }
}


?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Oplossing Error Handling</title>
    <style>

    </style>
  </head>

  <body>
    <h1>Geef uw kortingscode op</h1>
<?php if($is_valid):
    //   echo "jkdsjkkjkdsjk"; ?>
        <p>Korting toegekend!</p>
<?php endif ?>


<?php if(isset($message_error['type'])): ?>
    <?= $message_error['text'] ?> 

<?php endif ?>
     
                <form action="" method="POST">
                  <label for="code">Kortingscode:</label>
                  <input type="text" name="code">
                  <br>
                  <button type="submit" name="submit">Verzenden</button>
                </form>
               
  </body>

  </html>