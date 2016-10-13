<?php
$dieren 		= 	array( 'kip', 'vis', 'koe', 'paard', 'kamel');
$gesorteerde_dieren	=	$dieren;
$sort_array=	sort( $gesorteerde_dieren );

$zoogdieren=array( 'aap', 'slang', 'ezel');
$samen_toevoegen_arrays = array_merge($dieren, $zoogdieren);


?>
<html>
	<body>
		
		<p>Originele dieren array: <pre><?php var_dump( $dieren ) ?></pre></p>
		<p>Gesorteerde dieren array: <pre><?php var_dump( $gesorteerde_dieren ) ?></pre></p>
<p>zoogdieren : <pre><?php var_dump($zoogdieren ) ?></pre></p>
		<p>Samengevoegde dieren array: <pre><?php var_dump( $samen_toevoegen_arrays ) ?></pre></p>
				
	</body>
</html>
