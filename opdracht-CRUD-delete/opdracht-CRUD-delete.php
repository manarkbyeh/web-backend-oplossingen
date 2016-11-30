<?php
$messageContainer	=	'';
$teller=1;
$Message_d="";



try
{
    
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root'); // Connectie maken
    $messageContainer	=	'Connectie dmv PDO geslaagd.';
    
    
    $sql= "SELECT *
    FROM brouwers";
    
    $statement = $db->prepare($sql);
    
    
    // Een query uitvoeren
    
    $statement->execute();
    
    $fetchAssoc = array();
    
    
    while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
    {
        $fetchAssoc[]	=	$row;
    }
    if(isset($_POST['delete'])){
        $_POST['delete'];
}
    if(isset($_POST['ja'])){
    $sql2 = "DELETE FROM brouwers
    WHERE brouwernr  = :brouwernr";
    
    
    $Statement_d = $db->prepare($sql2 );
    $Statement_d->bindValue("brouwernr", $_POST['ja']);
    $check=$Statement_d->execute();
    if( $check ){
        $Message_d = "de rij die wilt verwijderen is verwijdert.";
    }else{
        $Message_d = "de rij die wilt verwijderen kan niet verwijdert worden.";
    }
    
}
}
catch ( PDOException $e )
{
    $messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
}
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Page Title</title>
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
    <section class="body">

      <h1>Voorbeeld van database resultaten ophalen en uitprinten (PDO)</h1>

      <p>
        <?php echo $messageContainer ?>
      </p>
      <p>
        <?php echo   $Message_d ?>
      </p>
      <?php if(isset($_POST["delete"])): ?>
        <form action=" " method="post">
          <p>Ben je zeker dat je deze rij wilt verwijderen ?</p>
          <button name="ja" value="<?=  $_POST['delete'] ?>">Ja</button>
          <button name="nee" value="">Nee</button>
        </form>
        <?php endif ?>
          <table>
            <thead>
              <th> nr </th>
              <?php foreach ($fetchAssoc[0] as $key => $value): ?>
                <th>
                  <?=$key ?>
                </th>
                <?php endforeach ?>
                  <th>delete</th>
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
                      <td>
                        <form action="opdracht-CRUD-delete.php" method="post">
                          <input type="image" name="delete" value="<?= $value['brouwernr'] ?>" src="delete.png">
                        </form>
                      </td>
                </tr>
                <?php endforeach;?>
            </tbody>
          </table>

    </section>
  </body>

  </html>