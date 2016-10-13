<?php 
$getal=7;
$eerstewaarde=0;
$tweedewaarde=0;
$boodschap="";
if($getal>=1 && $getal<=10){
$eerstewaarde=1;
$tweedewaarde=10;
$boodschap="het getal ligt tussen 1 en 10";
	
}
elseif($getal>=11 && $getal<=20){
	    $eerstewaarde=11;
        $tweedewaarde=20;
		$boodschap="het getal ligt tussen 11 en 20";
	
}
elseif($getal>=21 && $getal<=30){
	    $eerstewaarde=21;
        $tweedewaarde=30;
		$boodschap="het getal ligt tussen 21 en 30";
	
}
elseif($getal>=31 && $getal<=40){
	    $eerstewaarde=31;
        $tweedewaarde=40;
		$boodschap="het getal ligt tussen 31 en 40";
	
}
elseif($getal>=41 && $getal<=50){
	    $eerstewaarde=41;
        $tweedewaarde=50;
		$boodschap="het getal ligt tussen 41 en 50";
	
}
elseif($getal>=51 && $getal<=60){
	    $eerstewaarde=51;
        $tweedewaarde=60;
		$boodschap="het getal ligt tussen 51 en 60";
	
}
elseif($getal>=61 && $getal<=70){
	    $eerstewaarde=61;
        $tweedewaarde=70;
		$boodschap="het getal ligt tussen 61 en 70";
	
}
elseif($getal>=71 && $getal<=80){
	    $eerstewaarde=71;
        $tweedewaarde=80;
		$boodschap="het getal ligt tussen 71 en 80";
	
}
elseif($getal>=81 && $getal<=90){
	    $eerstewaarde=81;
        $tweedewaarde=90;
		$boodschap="het getal ligt tussen 81 en 90";
	
}
elseif($getal>=91 && $getal<=100){
	    $eerstewaarde=71;
        $tweedewaarde=80;
		$boodschap="het getal ligt tussen 91 en 100";
	
}else{
		$boodschap="het getal ligt niet tussen 1 en 100";
	
}
$boodschap= strrev ($boodschap);
?>
<html>
	<body>
		<?php echo $eerstewaarde   ?> <?php echo    $tweedewaarde   ?> <?php echo    $boodschap   ?>
	</body>
</html>