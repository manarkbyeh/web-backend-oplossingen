<?php 
	$dieren 		= 	array( 'kip', 'vis', 'koe', 'paard', 'kamel','aap', 'hond', 'konijn','vogel','slang');

$dieren_tweede_manier 	= 	array(
								  'landvoertuigen' => array('jeep','formule 1'),						 					  'watervoertuig' => array('hoovercraft','waterfiets'),
								  'luchtvoertuig' => array('Gulfstrea')
									);

?>
<html>
	<body>
			<p>eerste manier dieren: <pre><?php var_dump( $dieren ) ?></pre></p>
		<p>tweede manier dieren: <pre><?php var_dump( $dieren_tweede_manier ) ?></pre></p>

	</body>
</html>