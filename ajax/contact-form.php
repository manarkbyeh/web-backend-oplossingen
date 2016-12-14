<?php
session_start();
?>

  <!DOCTYPE html>
  <html>

  <body>
    <div id="error">
     <p >
    </p>
    </div>
   

    <form>
      <ul>
        <li> E-mail:
          <br>
          <input type="text" name="email" id="email" value="">
        </li>
        <li>
          <br> Comment:
          <br>
          <textarea name="message" id="msg"></textarea>
        </li>
        <li>
          <br>
          <br>
          <input type="checkbox" name="checkbox" value="" id="check"> Stuur een kopie naar mezelf:
        </li>
        <li>
          <br>
          <br>
          <input type="button" id="submit" name="submit" value="Send">

        </li>
      </ul>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="script.js"></script>
  </body>
  </html>