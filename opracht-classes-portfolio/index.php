<?php 
function __autoload($class){
    if (file_exists('classes/'.$class.'.php')) {
        
        require_once('classes/'.$class.'.php');
    } else {
        throw new Exception('deze classe bestaat niet ');
    }
}

spl_autoload_register("__autoload");
$HTMLBuilder= new HTMLBuilder("header.partial.php","body.partial.php","footer.partial.php");

?>