<?php
$dag="dag van de week";

$getal=2;
if($getal==1){
	//$dag=("maandag");
	//$dag=strtoupper("maandag");
	$dag=str_replace("a","A","maandag");
	
}
if($getal==2){
	//$dag="dinsdag";
	//$dag=strtoupper("dinsdag");
	$dag=str_replace("a","A","dinsdag");
	
	
}
if($getal==3){
	//$dag="woensdag";
	//$dag=strtoupper("woensdag");
$dag=str_replace("a","A","dinsdag");
	
	
}
if($getal==4){
		//$dag="donderdag";
	//$dag=strtoupper("donderdag");
$dag=str_replace("a","A","donderdag");

	
}
if($getal==5){
			//$dag="vrijdag";
	//$dag=strtoupper("vrijdag");
$dag=str_replace("a","A","vrijdag");
	
	
}
if($getal==6){
			//$dag="zaterdag";
//$dag=strtoupper("zaterdag");
	$dag=str_replace("a","A","zaterdag");
	
}
if($getal==7){
			//$dag="zondag";
	//$dag=strtoupper("zondag");
$dag=str_replace("a","A","zondag");
	
	
}
?>
<html>
	<body>
	<p><?php echo $getal ?> de dag van dit getal is <?php echo $dag ?> </p>	
	</body>
</html>