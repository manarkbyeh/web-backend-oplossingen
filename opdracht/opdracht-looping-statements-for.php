<?php
	$rijen=10;

    $kolommen=10;
	
	
?>



<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
	<style>
			

		 td {
   border: 1px solid black;
			
}
		.tabel{
		
			width: 500px;
			position: absolute;
			left: 400px;
			background-color: azure;
		}
	</style>
</head>
<body>
	<section class="tabel">
  <table>
      <?php for ($teller=0; $teller < $rijen; $teller++) { ?>
        <tr>
          <?php for ($kol_teller=0; $kol_teller < $kolommen; $kol_teller++) { ?>
            <td><?= $teller*$kol_teller ?> </td>
			
		
			 
         	<?php } ?>
        </tr>
	  
     	<?php  } ?>
    </table>
		</section>
		<section class="tabel">
  <table>
      <?php for ($teller=0; $teller < $rijen; $teller++) { ?>
        <tr>
          <?php for ($kol_teller=0; $kol_teller < $kolommen; $kol_teller++) { ?>
            <td>
              kolom
            </td>
			
		
			 
         	<?php } ?>
        </tr>
	  
     	<?php  } ?>
    </table>
		</section>

</body>
</html>
 