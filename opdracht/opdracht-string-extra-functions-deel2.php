<?php 
$fruit='ananas';

$fruit_positie=$fruit;
$aantal_karakters=( $fruit );

$zoek_letter="a";
$needlePosition	= 	strrpos( $fruit_positie, $zoek_letter );
$hoofd_letter=strtoupper($fruit);

?>
<html>
   
    <body>
		<?php echo $fruit ?>
		<p> de laatste  letter "a" van <?php echo $hoofd_letter ?> vind je op de <?php echo $needlePosition ?> plaats terug  </p>
	</body>
</html>