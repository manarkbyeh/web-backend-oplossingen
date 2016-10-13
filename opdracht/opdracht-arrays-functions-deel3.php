<?php
$nummers 		= 	array( 8, 7, 8, 7, 3, 2, 1, 2, 4);
$resultaat = array_unique($nummers);
$sort_resultaat=$resultaat;
rsort($sort_resultaat);


?>
<html>
	<body>
		<p>Originele getallen array: <pre><?php var_dump( $nummers ) ?></pre></p>
		<p>Unieke getallen array: <pre><?php var_dump( $resultaat ) ?></pre></p>

		<p>Omgekeerd gesorteerde getallen array: <pre><?php var_dump( $sort_resultaat ) ?></pre></p>
				
	</body>
</html>
