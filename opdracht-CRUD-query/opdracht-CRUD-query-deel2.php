<?php
$messageContainer	=	'';
$teller=1;

try
{
    
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root'); // Connectie maken
    $messageContainer	=	'Connectie dmv PDO geslaagd.';
    $sql =	 'SELECT brouwernr, brnaam FROM brouwers';
    $statement = $db->prepare($sql);
    
    // Een query uitvoeren
    $statement->execute();
    
    $fetchAssoc = array();
    $fetch_bier[] = array();
    
    while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
    {
        $fetchAssoc[]	=	$row;
    }
    if (isset($_GET['brouwer']))
    {
        $sql_bier = 'SELECT naam FROM bieren WHERE brouwernr = :brouwer';
        $search_bier = $db->prepare($sql_bier);
        $search_bier->bindvalue(':brouwer',$_GET['brouwer']);
        $search_bier->execute();
        while($row =$search_bier->fetch(PDO::FETCH_ASSOC))
        {
            $fetch_bier[] = $row;
        }
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
      .odd {
        background-color: #f5f5f5;
      }
      
      .even {
        background-color: #fff;
      }
    </style>
  </head>

  <body>

    <section>

      <h1>Voorbeeld van database resultaten ophalen en uitprinten (PDO)</h1>

      <p>
        <?php echo $messageContainer ?>
      </p>
      <form action="opdracht-CRUD-query-deel2.php" method="get">
        <select name="brouwer">
          <?php foreach($fetchAssoc as $row): ?>
          
            <?php if(isset($_GET["brouwer"]) && $_GET["brouwer"] === $row["brouwernr"]): ?>
              <option value="<?= $row['brouwernr'] ?>" selected>
                <?= $row["brnaam"] ?>
              </option>
              <?php else: ?>
                <option value="<?= $row['brouwernr'] ?>">
                  <?= $row["brnaam"] ?>
                </option>
                <?php endif ?>
                  <?php endforeach ?>
        </select>
        <button type="submit" name="submit">Geef mij alle bieren van deze brouwer</button>

      </form>

      <?php  if (isset($_GET['brouwer'])): ?>
        <table>
          <thead>
          <th>nr</th>
            <?php foreach ($fetchAssoc[0] as $key => $value): ?>
              <th>
                <?=$key ?>
              </th>
              <?php endforeach ?>
          </thead>
          <tbody>
            <?php foreach ($fetchAssoc as $key => $value) : ?>
              <tr class="<?php echo ($key%2) ? 'even' : 'odd' ?>">
                <td>
                  <?= $teller++ ?>
                </td>
                <?php foreach($value as $row): ?>
                  <td>
                    <?= $row ?>
                  </td>
                  <?php endforeach?>
              </tr>
              <?php endforeach;?>
          </tbody>
        </table>
        <?php endif ?>
    </section>

  </body>

  </html>