<?php
$messageContainer	=	'';
try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root','', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
$messageContainer	=	'Het lukt: ';

	$queryString = 'SELECT bieren.naam, bieren.alcohol 
									FROM bieren 
									WHERE bieren.alcohol = :alcoholPercentage';
	}
	catch ( PDOException $e )
	{
		$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
	}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
 
</head>

<body >

	<section class="body">

		<h1>Voorbeeld van database resultaten ophalen en uitprinten (PDO)</h1>	

		<p><?php echo $messageContainer ?></p>


	

	</section>
		
</body>
</html>