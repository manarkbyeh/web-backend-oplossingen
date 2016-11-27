<?php
	$messageContainer	=	'';
	$teller=1;

	try
	{

		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root'); // Connectie maken
		$messageContainer	=	'Connectie dmv PDO geslaagd.';
		$sql =	'SELECT *
    FROM bieren
    INNER JOIN brouwers
    ON brouwers.brouwernr=bieren.brouwernr
	WHERE bieren.naam LIKE "du%" AND brouwers.brnaam LIKE "%a%"';
	$statement = $db->prepare($sql);

		// Een query uitvoeren
		$statement->execute();

		$fetchAssoc = array();

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchAssoc[]	=	$row;
		}
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
 <style>
 .odd{
	 background-color: #f5f5f5;
 }
 .even{
	  background-color: #fff;
 }
 </style>
</head>

<body >

	<section class="body">

		<h1>Voorbeeld van database resultaten ophalen en uitprinten (PDO)</h1>	

		<p><?php echo $messageContainer ?></p>


	<table>
    <thead>
      	<?php foreach ($fetchAssoc[0] as $key => $value): ?> 
 			<th><?=$key ?></th>
 		<?php endforeach ?>
    </thead>
    <tbody>
       <?php foreach ($fetchAssoc as $key => $value) : ?>
        <tr class="<?php echo ($key%2) ? 'even' : 'odd' ?>">    <td><?= $teller++ ?></td>	
            <?php foreach($value as $row): ?>
              <td><?= $row ?></td>
            <?php endforeach?>
            </tr>
       <?php endforeach;?>
    </tbody>
</table>

	</section>
		
</body>
</html>