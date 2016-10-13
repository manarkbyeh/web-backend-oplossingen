<?php 
$array_test = array(
    'hemd' => '20$',
    'jas' => '100$',
    'tshirt' => '30$',
    'rok' => '50$',
    'broek' => '40$');
function drukArrayAf($array){
	
	foreach($array as $key => $value)
{
$resultaat_array[]="$"."array      ". $key ."     kost:". $value. "<br>";
}
	return $resultaat_array;
} 
$html="test de tekst";

function validateHtmlTag($html){
	$html_1="<html>";
	$html_2="</html>";
	
	if (preg_match($html_1,$html)  || preg_match($html_2,$html )) {
    $result= "A match was found.";
} else {
   $result= "A match was not found.";
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
	   <ul>
            <?php foreach ( drukArrayAf($array_test) as $value ): ?>
                <li><?= $value ?></li>
            <?php endforeach ?>
        </ul>
        <p>  <?php  echo validateHtmlTag($html) ?></p>
	

</body>
</html>