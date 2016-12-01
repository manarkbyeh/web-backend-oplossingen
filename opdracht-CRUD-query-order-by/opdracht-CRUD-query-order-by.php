<?php
$messageContainer	=	'';
$teller=1;

try
{
    	if (isset($_GET["order_by"]))
	{
		$array_query = explode('-',$_GET["order_by"]);
		$query_order_by = 'my order ' . 	$array_query[0] . ' ' . $array_query[1];
		
	}
    
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root'); // Connectie maken
    $messageContainer	=	'Connectie dmv PDO geslaagd.';
    
    $sql="SELECT bieren.biernr, bieren.naam, brouwers.brnaam, soorten.soort, bieren.alcohol FROM bieren INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr INNER JOIN soorten ON soorten.soortnr = bieren.soortnr ";
    $statement_o = $db->prepare($sql);
    $statement_o->execute();
    $fetchAssoc = array();
    while ( $row = $statement_o->fetch(PDO::FETCH_ASSOC) )
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

    </style>
  </head>

  <body>

    <section class="body">

      <h1>Voorbeeld van database resultaten ophalen en uitprinten (PDO)</h1>

      <p>
        <?php echo $messageContainer ?>
      </p>
      <table>
    <thead>
      
      	<?php foreach ($fetchAssoc[0] as $key => $value): ?> 
 		
 			
                         <th class="order <?= ($_GET["order_by"] === $array_query[0] . "-asc") ? "ascending" : "descending"  ?>"><a href="opdracht-CRUD-query-order-by.php?order_by=<?= $key ?><?= ($_GET["order_by"] === $array_query[0] . "-asc")? "-desc" : "-asc" ?>"><?= $key ?></a></th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach($fetchAssoc as $key => $value) : ?>
          <tr>
            <?php foreach($value as $k => $v) : ?>
              <td><?= $v ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>

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