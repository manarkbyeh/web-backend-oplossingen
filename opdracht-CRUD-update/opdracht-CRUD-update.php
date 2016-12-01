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
    if(isset($_POST["edit"]))
    {
        
        $sql3 = 'SELECT brnaam, brouwernr FROM brouwers WHERE brouwernr = :br_nr';
        $Statement_e = $db->prepare(	$sql3);
        $Statement_e->bindValue(":br_nr", $_POST["edit"]);
        $Statement_e->execute();
        $naam =  $Statement_e->fetch(PDO::FETCH_ASSOC);
        $message_e = $naam["brnaam"] . " ( #" .$_POST["edit"] . " ) ";
    }
    if (isset($_POST["wijzigen"]))
    {
        
        $sql4="UPDATE brouwers SET brnaam=:naam,adres=:adres,postcode=:postcode,gemeente=:gemeente,omzet=:omzet WHERE brouwernr=:brouwernr";
        $Statement_edit=$db->prepare( $sql4);
        $Statement_edit->bindValue(":naam", $_POST["brouwernaam"]);
        $Statement_edit->bindValue(":adres", $_POST["adres"]);
        $Statement_edit->bindValue(":postcode", $_POST["postcode"]);
        $Statement_edit->bindValue(":gemeente", $_POST["gemeente"]);
        $Statement_edit->bindValue(":omzet", $_POST["omzet"]);
        $Statement_edit->bindValue(":brouwernr", $_POST["brouwernr"]);
        $Statement_edit->execute();
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
          <?php if(isset($_POST["edit"])): ?>
            <h1>  <?php echo  $message_e  ?> </h1>
            <form action=" " method="post">
              <input type="hidden" name="brouwernr" value="<?=$_POST["edit"]?>">
              <label for="Brouwernaam">Brouwernaam</label>
              <input name="brouwernaam" type="text" value="<?=$_POST["brouwernaam"] ?>" placeholder="Type Here">
              <br>

              <label for="adres">adres</label>
              <input name="adres" type="text" value="<?=$_POST["adres"] ?>" placeholder="Type Here">
              <br>

              <label for="postcode">postcode</label>
              <input name="postcode" type="text" value="<?=$_POST["postcode"] ?>" placeholder="Type Here">
              <br>
              <label for="gemeente">gemeente</label>
              <input name="gemeente" type="text" value="<?=$_POST["gemeente"] ?>" placeholder="Type Here">
              <br>

              <label for="omzet">omzet</label>
              <input name="omzet" type="text" value="<?=$_POST["omzet"] ?>" placeholder="Type Here">
              <br>

              <button type="submit" name="wijzigen">wijzigen</button>

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
                      <th>edit</th>
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
                            <form action="opdracht-CRUD-update.php" method="post">
                              <input type="image" name="delete" value="<?= $value['brouwernr'] ?>" src="delete.png">
                            </form>
                          </td>
                          <td>
                            <form action="opdracht-CRUD-update.php" method="post">
                              <input type="image" name="edit" value="<?= $value['brouwernr'] ?>" src="edit.png">
                            </form>
                          </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
              </table>

    </section>
  </body>

  </html>