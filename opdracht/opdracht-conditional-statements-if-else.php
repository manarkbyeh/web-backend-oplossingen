<?php 
$jaartal=2015;
$is_een_schrikkeljaar=false;
if(($jaartal/4==0)&&($jaartal/100!=0)&&($jaartal/400==0)){
	$is_een_schrikkeljaar=true;
}else{
	$is_een_schrikkeljaar;
	
}
?>
<html>
	<body>
		<p>
			het is <?=$jaartal ?> <?php echo ( $is_een_schrikkeljaar ) ? "een schrikkeljaar" : "geen schrikkeljaar"  ?>
		</p>
	</body>
</html>