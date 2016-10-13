<?php 
$bedrag=100000;
$rentevoet =1.08;
$verplicht_aantal_jaren=10;
$teller=0;

function Hans_geld_berekenen(){
	global $bedrag;
	global $rentevoet;
	global $verplicht_aantal_jaren;
	global $teller;

	
$bedrag=$bedrag*$rentevoet;
	if($verplicht_aantal_jaren < $teller){
		$teller++;
		return $teller." ".$bedrag;		

		Hans_geld_berekenen();
		
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

</body>
</html>