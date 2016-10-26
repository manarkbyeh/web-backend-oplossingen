<?php

$bestand	= file_get_contents('opdracht-cookies2.txt');
$arr = json_decode($bestand, true);
$msg='';
if(isset($_COOKIE["manar"])){
    $n = $_COOKIE["manar"];
    $msg = "dag ".$n;
}

if(isset($_POST['name']) && isset($_POST['password'])){
    $tm = 3600*24;
    if(isset($_POST['rme']) && $_POST['rme']=="true"){
        $tm *=30;
    }
    $name=$_POST['name'];
    $pass=$_POST['password'];
    
    for($i=0,$len = count($arr);$i<$len;$i++){
        if($arr[$i]['name'] == $name && $arr[$i]['pass'] == $pass){
            setcookie("manar", $name, time() + $tm);
            $msg = "dag ".$name;
        }
    }
    
}else if(isset($_GET['logout'])){
    setcookie("manar", "", time() -  (3600*24*30));
    header("location: opdracht-cookies-deel2.php");
}


?>
  <html>

  <body>
    <h1>Inloggen</h1>
    <?php  if($msg == ''):?>
      <form action="opdracht-cookies-deel2.php" method="post">
        Name:
        <input type="text" name="name">
        <br> password:
        <input type="password" name="password">
        <br> Remember me
        <input type="checkbox" name="rme" value="true">
        <br />
        <input type="submit" value="verzenden" name="verzenden">
      </form>
      <?php else:
    echo $msg;
?>
        <a href="?logout=true">Uitloggen</a>
        <?php endif; ?>
  </body>

  </html>