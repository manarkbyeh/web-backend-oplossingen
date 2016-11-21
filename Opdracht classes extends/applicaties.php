<?php

function __autoload($class){
    if (file_exists('classes/'.$class.'.php')) {
        
        require_once('classes/'.$class.'.php');
    } else {
        throw new Exception('deze classe bestaat niet ');
    }
}

spl_autoload_register("__autoload");
$bear= new Animal('bear','male',90);
$fox= new Animal('fox','female',200);
$goose= new Animal('goose','male',20);

$simba=	new Loin("Simba"."'s"	,"", 100, "Congo lion");
$scar	=	new Loin("Scar"."'s", "", 200, "Kenia lion");
$Zeke =	new Loin("Zeke"	,"","" , "Quagga");
$Zana	=	new Loin("Zana", "", "", "Selous");


?>
  <!DOCTYPE html>
  <html>



  <body>

    <h2>Oplossing PHPoefening 040</h2>
    <p>
      <?= $bear->getName() ?> is van het geslacht
        <?= $bear->getGender() ?>en heeft momenteel
          <?= $bear->getHealth() ?>levenspunten</p>
    <p>
      <?= $fox->getName() ?> is van het geslacht
        <?= $fox->getGender() ?>en heeft momenteel
          <?= $fox->getHealth() ?>levenspunten</p>
    <p>
      <?= $goose->getName() ?> is van het geslacht
        <?= $goose->getGender() ?>en heeft momenteel
          <?= $goose->getHealth() ?>levenspunten</p>

    <h2>Specifieke dierenklassen die gebaseerd zijn op de Animal klasse</h2>
    <h3>Leeuwen</h3>

    <p>
      <?= $simba->getName() ?>
     (soort: <?= $simba->getSpecies() ?>)  special move
          <?= $simba->doSpecialMove() ?></p>
    <p>
      <?= $scar->getName() ?>
        (soort: <?= $scar->getSpecies() ?>) special move
          <?= $scar->doSpecialMove() ?></p>
    <p>
  <p>
      <?= $Zeke->getName() ?>
     (soort: <?= $Zeke->getSpecies() ?>)  special move
          <?= $Zeke->doSpecialMove() ?></p>
    <p>
      <?= $Zana->getName() ?>
        (soort: <?= $Zana->getSpecies() ?>) special move
          <?= $Zana->doSpecialMove() ?></p>
    <p>


  </body>

  </html>