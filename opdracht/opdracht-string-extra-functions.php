<?php 
$fruit='kokosnoot';
$fruit_positie=$fruit;
$aantal_karakters=strlen( $fruit );
$zoek_letter="o";
$needlePosition	= 	strpos( $fruit_positie, $zoek_letter );

?>
<html>
   
    <body>
		<?php echo $fruit ?>
		<p>de lengte van de kokosnoor is <?php echo $aantal_karakters ?> en de letter "o" vind je op de <?php echo $needlePosition ?> plaats terug  </p>
	</body>
</html>