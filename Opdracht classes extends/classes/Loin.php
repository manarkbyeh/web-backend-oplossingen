<?php

class Loin extends Animal {
    
    protected	$name,$gender,$health,$species ;
    public function __construct($name, $gender, $health,$species)
    {
        
       parent::__construct($name, $gender, $health, $species);
        $this-> species = $species;
    }
    public function getSpecies()
    {
        return $this->species;
    }
    
   
   
    public function doSpecialMove()
    {
        
        return 'roar';
    }
    
    
}

?>