<?php

$text	=	file_get_contents( 'text-file.txt' );
$splits_de_tekst=str_split($text);
$sort_text=rsort($splits_de_tekst);
$aantal=count($sort_text);
$reversed = array_reverse($splits_de_tekst);
$check_array=array();
foreach ($reversed as $value)
	if (array_key_exists($value,$check_array))
  {
 ++$check_array[$value];
  }
else
  {
 
	  $check_array[$value]=1;
  }



	
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
  <ul>
   
    <li><pre><?php var_dump( $check_array ) ?></pre></li>
	 <li><pre><?php var_dump( $sort_text ) ?></pre></li>
	   <li><pre><?php var_dump( $reversed ) ?></pre></li>
  
  </ul>

</body>
</html>