<?php
$dieren 		= 	array( 'kip', 'vis', 'koe', 'paard', 'kamel');
$aantal_array=	count( $dieren );
$op_te_zoeken_dieren="vis";

$dieren_gevonden=in_array( $op_te_zoeken_dieren, $dieren );
$aantal_dieren_gevonden=	count( $dieren_gevonden );

if($aantal_dieren_gevonden ){
		$resultaat = $aantal_dieren_gevonden . ' dieren in de lijst!';
	}
	else 
	{
		$resultaat = 'Er zijn geen waarden teruggevonden in de lijst van dieren!';
	}


?>
<html>
	<body>
		<h1>Oplossing array functies - deel 1</h1>
		<p> <pre><?php var_dump( $dieren ) ?></pre></p>
				<p> het aantal dieren<?= $aantal_array ?></p>
	<p> <?= $op_te_zoeken_dieren ?> <?= $resultaat ?></p>
	</body>
</html>
