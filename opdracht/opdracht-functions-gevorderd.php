<?php 
$md5HashKey='d1fa402db91a7a93c4f414b8278ce073';
$para1="2"; 
$para2="8"; 
$para3="a"; 


function soort_variables($para1) 
	{
	global $md5HashKey;
				
	$aantal_2= substr_count($md5HashKey,$para1);
$lengte=strlen($md5HashKey);
		$som= (100/$lengte)*$aantal_2;
	return $som;

	
	}

function soort_variables2($var_d,$para2) 
	{
			
	$aantal_2= substr_count($var_d,$para2);
$lengte=strlen($var_d);
		$som= (100/$lengte)*$aantal_2;
	return $som;

	
	}
function soort_variables1($para3) 
	{
			
	$aantal_2= substr_count($GLOBALS['md5HashKey'],$para3);
$lengte=strlen($GLOBALS['md5HashKey']);
		$som= (100/$lengte)*$aantal_2;
	return $som;

	
	}


?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

	<p> de cijfer <?= $para1 ?> komt <?php echo soort_variables($para1) ?>keren in <?= $md5HashKey ?> </p>
	<p> de cijfer <?= $para2 ?> komt <?php echo soort_variables2($md5HashKey,$para2) ?>keren in <?= $md5HashKey ?> </p>

		<p> de cijfer <?= $para3 ?> komt <?php echo soort_variables1($para3) ?>keren in <?= $md5HashKey ?> </p>
</body>
</html>
