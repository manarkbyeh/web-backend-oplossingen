<?php 
$bedrag=100000;
$rentevoet =1.08;
$verplicht_aantal_jaren=10;
$teller=0;


function Hans_geld_berekenen($bedrag,$rentevoet,$verplicht_aantal_jaren,$teller ){

	

	if($verplicht_aantal_jaren < $teller){
		$teller++;
	$bedrag*=$rentevoet;
		

echo Hans_geld_berekenen($bedrag,$rentevoet,$verplicht_aantal_jaren,$teller );
		
	}
	
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<?php Hans_geld_berekenen($bedrag,$rentevoet,$verplicht_aantal_jaren,$teller ); ?>
</body>
</html>