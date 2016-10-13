<?php 
 $aantal_seconden=221108521;
$minuten=60;
 $uren= 60*$minuten;
 $dagen= 24*$uren;
$weken= 7*$dagen;
 $maanden= 31*$dagen;
$jaren= 365*$dagen;
$aantal_minuten=floor($aantal_seconden/$minuten);
$aantal_uren=floor($aantal_seconden/$uren);
$aantal_dagen=floor($aantal_seconden/$dagen);
$aantal_weken=floor($aantal_seconden/$weken);
$aantal_maanden=floor($aantal_seconden/$maanden);
$aantal_jaren=floor($aantal_seconden/$jaren);




	


?>
<html>
	<body>
		<h1>Oplossing if else: deel2</h1>
		<p>
				<h3>Aantal seconden in een ...</h3>
			<ul>
				<li>minuten <?php echo ( $minuten ) ?></li>
				<li> uren <?php echo ( $uren ) ?></li>
				<li>dagen  <?php echo ( $dagen ) ?></li>
				<li>weken <?php echo ( $weken ) ?></li>
				<li> maanden <?php echo ( $maanden ) ?></li>
				<li>jaren <?php echo ( $jaren ) ?></li>
		</ul>
		
			<h3>Aantal ... in 221108521 seconden</h3>
			<ul>
				<li>	aantal minuten <?php echo ( $aantal_minuten ) ?></li>
				<li>aantal uren <?php echo ( $aantal_uren ) ?></li>
				<li>aantal dagen  <?php echo ( $aantal_dagen ) ?></li>
				<li>aantal weken <?php echo ( $aantal_weken ) ?></li>
				<li>aantal maanden <?php echo ( $aantal_maanden ) ?></li>
				<li>aantal jaren <?php echo ( $aantal_jaren ) ?></li>
		</ul>
		
		</p>
	</body>
</html>