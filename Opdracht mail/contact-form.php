<?php
session_start();
if (isset($_SESSION["notification"]))
{
    $notification= $_SESSION["notification"] ;
}
?>

  <!DOCTYPE html>
  <html>

  <body>
    <p>
      <?= $notification ?>
    </p>

    <form action="contact.php" method="post">
      <ul>
        <li> E-mail:
          <br>
          <input type="text" name="email" value="<?php if ( isset( $_SESSION['email'] ) ) { echo $_SESSION['email'];} ?>">
        </li>
        <li>
          <br> Comment:
          <br>
          <textarea name="message" type="text">
            <?php if(isset($_SESSION['message'])) {
echo htmlentities ($_SESSION['message']); }?>
          </textarea>
        </li>
        <li>
          <br>
          <br>
          <input type="checkbox" name="checkbox" value="<?php if ( isset( $_SESSION['checkbox'] ) ) { echo " checked='checked' ";} ?>"> Stuur een kopie naar mezelf:
        </li>
        <li>
          <br>
          <br>
          <input type="submit" name="submit" value="Send">

        </li>
      </ul>
    </form>

  </body>

  </html>