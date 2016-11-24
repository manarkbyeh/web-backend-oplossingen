<?php
session_start();
$is_valid=false;
$controle_code=8;

function __autoload($class){
    if (file_exists('classes/'.$class.'.php')) {
        
        require_once('classes/'.$class.'.php');
    } else {
        throw new Exception('deze classe bestaat niet ');
    }
}
spl_autoload_register("__autoload");
$message_instantie = new message();


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
                throw new ExceptionImproved(array("VALIDATION-CODE-LENGTH"));
            }
        }
        else
        {
            throw new  ExceptionImproved(array("SUBMIT-ERROR"));
        }
    }
}
catch( ExceptionImproved $e){
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
if(  $createMessage){
    $message_instantie->setMessage(   $message);
    
}
$my_message=    $message_instantie->getMessage();

}



function logToFile(  $message){
    
    $log_file = array();
    
    $log_file['date'] 		= '[' . date("H:i:s d/m/Y") . ']';
    $log_file['IP']	= $_SERVER['REMOTE_ADDR'];
    $log_file['Error_type']	=  $message['type'];
    $log_file['Error_text']	=  $message['text'];
    $log_file['NewLine']		= "\n\r";
    $log_message = implode(' ',   $log_file);
    file_put_contents('log.txt',   $log_message , FILE_APPEND);
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
      <?php endif;


if( $message_instantie->getMessage() !== null):
// echo "jkdsjkkjkdsjk";
echo $my_message["text"];
endif ?>

        <form action=" " method="POST">



          <label for="code">Kortingscode:</label>
          <input type="text" name="code">
          <br>

          <button type="submit" name="submit">Verzenden</button>
        </form>




  </body>

  </html>