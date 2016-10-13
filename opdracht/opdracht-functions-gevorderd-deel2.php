<?php 
$pigHealth=5;
$maximumThrows=8;
$result = array();
function calculateHit(){
	  global $pigHealth;
	$number = rand(1 , 10);
	
	if($number <=4){
		$pigHealth--;
		return "Mis! Nog ".$pigHealth." varkens in het team.";
	}else{
		return  "Raak! Er zijn nog maar ".$pigHealth."  arkens over";
	}
	
}
function launchAngryBird(){
global $maximumThrows,$pigHealth;
	global $result;
	static $numCalls =0;
	if($numCalls < $maximumThrows){
		$result[] =calculateHit();
		$numCalls++;
		
		launchAngryBird();
		
	}else{
		if($pigHealth==0){
			$result[]="gewonnen";
		}else
				$result[]="verloren";
	}
	return $result;
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
	<h1>
		Oplossing functies gevorderd: deel2 Angry Birds
	</h1>
	<ul>
		<?php foreach(launchAngryBird() as $value){ ?>
		<li>
			<?= $value; ?>
		</li>
		
		<?php } ?>
	
	
 
</body>
</html>
