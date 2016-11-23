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
                $isValid = true;
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
   if(  $createMessage){
        $message_instantie->setMessage($message);
        
    }
     $message_instantie->getMessage($message);
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
      .error {
        color: firebrick;
      }
    </style>
  </head>

  <body>
    <h1>Geef uw kortingscode op</h1>
    <?php if($is_valid): ?>
      <?php echo "jkdsjkkjkdsjk" ?>
        <p>Korting toegekend!</p>
        <?php endif; ?>
          <?php if(!$is_valid): ?>

            <form action=" " method="POST">

              <?php if(null !== $message_instantie->setMessage()): ?>
             
   <?php echo "jkdsjkkjkdsjk" ?>
                  <?=   $message_instantie->getMessage($message); ?>

                    <?php endif; ?>

                      <label for="code">Kortingscode:</label>
                      <input type="text" name="code">
                      <br>

                      <button type="submit" name="submit">Verzenden</button>
            </form>
            <?php endif ?>
            


  </body>

  </html>