<?php
class Percent
	{
public $absolute;
public $relative;
public $nominal;
public $hundred;
	
function __construct($new, $unit)
{
    $this->absolute 	= $this->format_number($new / $unit);
    $this->relative 	= $this->format_number( $this->absolute-1);
    $this->hundred 	= $this->format_number( $this->absolute*100);
    if($this->absolute > 1) {
        $this->nominal = "positive";
    }
    elseif($this->absolute == 1) {
        $this->nominal = "status-quo";
    }
    else {
        $this->nominal = "negative";
    }
  
}
 function format_number($number)
    {
        return number_format($number,2)."<br>";
        
    }
    }
?>