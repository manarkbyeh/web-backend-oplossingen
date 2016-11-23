<?php
class message{
    
    public $message;
    
    function setMessage() {
        $_SESSION['message']= $this->message;
        
    }
    function getMessage() {
        $my_message = array();
        if(isset($_SESSION['message'])) {
            $_SESSION['message']= $this->message;
            
            unset($_SESSION['message']);
            return $my_message;
        }
        else {
            return false;
        }
    }
}
?>
  }