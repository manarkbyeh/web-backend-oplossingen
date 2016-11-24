<?php 
class ExceptionImproved extends  Exception (){
    public $exception_array;
	public function __construct($exception_array)
	{
		$this->exception_array = $exception_array;
	}
}
}
?>