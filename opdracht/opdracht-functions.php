<?php 
function berekenSom($getal1,$getal2){
	$som=$getal1+$getal2;
	return $som;
} 

	function vermenigvuldig($getal1,$getal2){
	$som=$getal1*$getal2;
	return $som;
} 
$testgetal=5;
function isEven($getal1){
	$is_valid=false;
	if($getal1%2==0){
		$is_valid=true;
	}
	return $is_valid;
} 
function uppercase_lengte($str){
	$str_hoofd_letter = strtoupper($str);
$str_lengte=strlen($str);
	$opsom_resultaat=array($str_hoofd_letter,$str_lengte);
	return $opsom_resultaat;
} 
$opsoming=uppercase_lengte("whatisdenaamvanuw");
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
        <p>de som van 100 en 200 is <?= berekenSom(100,200) ?></p>
		<p>de vermenigvuldig van 2 en 4 is<?= vermenigvuldig(2,4) ?></p>
		 <p><?= $opsoming[0] ?></p>
	 <p><?= $opsoming[1] ?></p>
			
			<p><?php echo $testgetal ?> het is <?php echo ( isEven($testgetal) ) ? "even" : "oneven"  ?></p>



</body>
</html>