<?php 
$getal_van_de_dag=5;
$dag="";
switch ($getal_van_de_dag) 
		{
			case '1':
				$dag="vandaag is maandag";
		        break;
			 case '2':
				$dag="vandaag is dinsdag";
		        break;
		     case '3':
				$dag="vandaag is woensdag";
		        break;
			 case '4':
				$dag="vandaag is donderdag";
		        break;
		     case '5':
				$dag="vandaag is vrijdag";
		        break;
			 case '6':
				$dag="vandaag is zaterdag";
		        break;
	         case '7':
				$dag="vandaag is zondag";
		        break;
			
			default:
				$dag="daar is geen enkel dag die dat cijfer heeft";	}
?>
<html>
	<body>
		<p>De dag die overeenkomt met het getal <?php echo $getal_van_de_dag  ?> is: <?php echo $dag  ?></p>
	</body>
</html>