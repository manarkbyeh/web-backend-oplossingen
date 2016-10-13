<?php
$getal=0;
$teller=0;
$max_getal=100;
$totaal_tellers;
$getal_door_drie_deelbaar=0;
	/*while( $teller != $max_getal) {
		echo $teller . ',';
		++$teller;
	
	}*/
while( $getal_door_drie_deelbaar != $max_getal) {
		if($getal_door_drie_deelbaar%3==0 &&$getal_door_drie_deelbaar>40 &&$getal_door_drie_deelbaar<80  ){
			echo  $getal_door_drie_deelbaar . ',';
		}
	++$getal_door_drie_deelbaar;
	}
//deel2 

$boodschappenlijstje= array("pasta", "thee", "sauzen","vlees", "vis", "koek");
$resultaat = count($boodschappenlijstje);
$teller_lengte=0;


?>
<!DOCTYPE html>
<html>
<head>
<title>opdracht-looping-statements-while
</title>
</head>
<body>


	<ul>
			<?php while ( $teller_lengte < $resultaat ): ?>

				<li><?php echo  $boodschappenlijstje[$teller_lengte] ?></li>

				<?php ++$teller_lengte ?>

			<?php endwhile ?>
		</ul>
</body>
</html>