<?php
session_start();

if(isset($_GET["session"]) && $_GET["session"]=="remove" ){
  session_destroy();
  header("location: opdracht-session-gevorderd.php");
  exit();
}



if(!isset($_SESSION["task"])){
    $_SESSION["task"] =  array (
    array("rijst", 0),
    array("appel", 0),
    array("melk", 0)
    );
}




if(isset($_POST["rijst"]) && $_POST["rijst"] =="delete" ){
    $_SESSION["task"][0][1]= 0;
}else if(isset($_POST["rijst"]) && $_POST["rijst"] =="sub" ){
    $count =intval($_SESSION["task"][0][1]);
    $_SESSION["task"][0][1]=  --$count;
}else if(isset($_POST["rijst"])&& $_POST["rijst"] =="add"){
    $count =intval($_SESSION["task"][0][1]);
    $_SESSION["task"][0][1]=  ++$count;
}


if(isset($_POST["appel"]) && $_POST["appel"] =="delete" ){
    $_SESSION["task"][1][1]= 0;
}else if(isset($_POST["appel"]) && $_POST["appel"] =="sub"){
    $count =intval($_SESSION["task"][1][1]);
    $_SESSION["task"][1][1]=  --$count;
}else if(isset($_POST["appel"]) && $_POST["appel"] =="add"){
    $count =intval($_SESSION["task"][1][1]);
    $_SESSION["task"][1][1]=  ++$count;
}




if(isset($_POST["melk"]) && $_POST["melk"] =="delete" ){
    $_SESSION["task"][2][1]= 0;
}else if(isset($_POST["melk"]) && $_POST["melk"] =="sub"){
    $count =intval($_SESSION["task"][2][1]);
    $_SESSION["task"][2][1]= --$count;
  
}else if(isset($_POST["melk"])  && $_POST["melk"] =="add"){
    $count =intval($_SESSION["task"][2][1]);
    $_SESSION["task"][2][1]= ++$count;
  
}




?>



  <!DOCTYPE html>
  <html>

  <head>
    <title>Page Title</title>
  </head>

  <body>

    <h1>This is a Heading</h1>
    <p>This is a paragraph.</p>
    <form action="opdracht-session-gevorderd.php" method="POST">

      <button type="submit" name="rijst" value="add">rijst</button>
      <br>
      <button type="submit" name="appel" value="add">appel</button>
      <br>
      <button type="submit" name="melk" value="add">melk</button>
      <br>

    </form>
    <?php
$header = true;
for($i =0 ;$i<3;$i++):
    if($_SESSION["task"][$i][1]>0):
        if($header):
           echo  '<form action="opdracht-session-gevorderd.php" method="POST">';
           $header = false;
        endif;
                    $name = $_SESSION["task"][$i][0];
                    $count = $_SESSION["task"][$i][1];

        echo ' <div>
               <button type="submit" name="'.$name.'" value="delete">x</button>  '.$name.'  
               <button type="submit" name="'.$name.'" value="sub">-</button>  ('. $count .')  
               <button type="submit" name="'.$name.'" value="add">+</button>
              </div>';

        endif;
endfor;
if(!$header)
  echo ' </form>';

?>
   <a href="opdracht-session-gevorderd.php?session=remove">Verlaat de winkel</a>
     
  </body>

  </html>