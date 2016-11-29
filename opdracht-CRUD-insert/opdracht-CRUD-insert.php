<?php
$messageContainer	=	'';
$teller=1;
$message="";

    try
    {
        
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root'); // Connectie maken
        $messageContainer	=	'Connectie dmv PDO geslaagd.';
        if(isset($_POST["submit"])) {
        $Brouwernaam=$_POST["brouwernaam"];
        $adres=$_POST["adres"];
        $postcode=$_POST["postcode"];
        $gemeente=$_POST["gemeente"];
        $omzet=$_POST["omzet"];
        
        $sql= "INSERT INTO brouwers(brnaam, adres, postcode, gemeente, omzet) VALUES (:Brouwernaam, :adres, :postcode, :gemeente, :omzet)";
        
        $statement = $db->prepare($sql);
        $statement->bindValue(":Brouwernaam",  $Brouwernaam);
        $statement->bindValue(":adres",  $adres);
        $statement->bindValue(":postcode",  $postcode);
        $statement->bindValue(":gemeente",  $gemeente);
        $statement->bindValue(":omzet",$omzet);
        
        // Een query uitvoeren
    
          if($statement->execute()) {
          $b_id = $db->lastInsertId();
          $message = "goed gedaan en de id is  " .   $b_id;
        } else {
          $message = "daar is iets fouts gebeurt";
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
  </head>

  <body>
    <p>
      <?php echo $messageContainer ?>
    </p>
    <form action=" " method="post">

      <label for="Brouwernaam">Brouwernaam</label>
      <input name="brouwernaam" type="text" placeholder="Type Here">
      <br>

      <label for="adres">adres</label>
      <input name="adres" type="text" placeholder="Type Here">
      <br>

      <label for="postcode">postcode</label>
      <input name="postcode" type="text" placeholder="Type Here">
      <br>
      <label for="gemeente">gemeente</label>
      <input name="gemeente" type="text" placeholder="Type Here">
      <br>

      <label for="omzet">omzet</label>
      <input name="omzet" type="text" placeholder="Type Here">
      <br>

      <button type="submit" name="submit">Verzenden</button>

    </form>
    <p>
      <?php echo $message ?>
    </p>
  </body>
  </html>