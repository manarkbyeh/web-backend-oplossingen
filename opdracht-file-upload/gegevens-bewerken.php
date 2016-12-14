<?php

session_start();
if (isset($_COOKIE['login'])) {
    
    $my_data=explode(",",$_COOKIE["login"]);
    $my_array_email =  $my_data[0];
    $my_array_hash =  $my_data[1];
    $my_array_id =  $my_data[2];
   

    if (isset($_POST['submit'])) {
        $name=$_FILES['pic']['name'];
        $size=$_FILES['pic']['size'];
        $type=$_FILES['pic']['type'];
        $max_upload_file=2097152;
        $img='img';
        $path=$img.'/'.time().$name;
        $is_valid=false;
        if(isset($name) ) {
            if(!empty($name)){
                if( $size != false ) {
                    
                    $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $extension = end(explode(".", $name));
                    if (($size <  $max_upload_file) && in_array($extension, $allowedExts)){
                        $tmp_name=$_FILES['pic']['tmp_name'];
                        if(move_uploaded_file($tmp_name, $path)){
                            
                            $_SESSION["notification"]="foto is upgeloaden";
                            $connect = new PDO('mysql:host=localhost;dbname=oplossing_file_upload', 'root', 'root', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                            $sql = "UPDATE users SET email = :email, profile_picture = :pic WHERE id = :id";
                            $statement =    $connect->prepare($sql);
                            $statement->bindValue(":email",   $_POST['email']);
                             $statement->bindValue(":pic", $path);
                            $statement->bindValue(":id",$my_array_id);
                            $uitvoer= $statement->execute();
                            // echo $_POST['email'];
                            // echo  $path;
                            // echo $my_array_email;
                            // exit();
                            
                            if($uitvoer)
                            {
                                  $val = $_POST['email'].",".$my_array_hash .",".$my_array_id ;
                                 setcookie("login",$val, time() + 2592000);
                                $_SESSION["notification"]="foto is upgedite";
                                header("Location: gegevens-wijzigen-form.php");
                                exit();
                            }
                            else
                            {
                                $_SESSION["notification"]="foto kan niet upgedite worden";
                                header("Location: gegevens-wijzigen-form.php");
                                exit();
                            }
                            
                            
                            
                            header("Location: gegevens-wijzigen-form.php");
                            
                        }else{
                            echo "mad5altech";
                            exit();
                            $_SESSION["notification"]="foto hebben we al ";
                            header("Location: gegevens-wijzigen-form.php");
                            exit();
                        }
                        
                    }
                    
                }else{
                    $_SESSION["notification"]="foto size moet groter zijn dan 0";
                    header("Location: gegevens-wijzigen-form.php");
                    echo "size";
                    exit();
                }
            }
        }
    }}
    
    ?>
  <!DOCTYPE html>
  <html>

  <body>
    <p>
      <?= '<img src="img/$name">' ?>


    </p>




  </body>

  </html>