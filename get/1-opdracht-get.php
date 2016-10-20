<?php
$artikels=array( array(
    'titel' => "How can a company repair a damaged reputation?",
    'datum' => "foo",
    'inhoud' => "A company disaster on the scale of the Samsung Galaxy Note 7 crisis is like rolling thunder - it doesn't just end with a plummeting share price, a quarterly profits warning, and a product recall.",
    'afbeelding' => "fire.jpg",
	'afbeeldingBeschrijving' => "Samsung has a battle on its hands to restore its reputation",
	'lees' =>"lees meer",
),
 array(
    'titel' => "Why does Africa import so many chickens?",
    'datum' => "foo",
    'inhoud' => "With a growing appetite for chicken in Africa, BBC Africa's Kim Chakanetsa investigates why the continent does not produce enough birds to feed itself.",
    'afbeelding' => "chicken_lagos_afp.jpg",
	'afbeeldingBeschrijving' => "With a growing appetite for chicken in Africa",
	 'lees' =>"lees meer",
),
 array(
    'titel' => "Is this the world's most oversubscribed school?",
    'datum' => "foo",
    'inhoud' => "Is this the most oversubscribed school in the world?
The VidyaGyan Leadership Academy, a boarding school in India's Uttar Pradesh state, is offering an elite education for pupils drawn from the rural poor.",
    'afbeelding' => "school.jpg",
	'afbeeldingBeschrijving' => "The VidyaGyan school is aimed at giving an elite education to rural, underprivileged families",
	 'lees' =>"lees meer",
),);
	
$is_valid=false;
$is_niet_valid=false;

if (array_key_exists('id', $_GET)) {
    $id= $_GET['id'];
	if ( array_key_exists( $id , $artikels ) )
		{
			$artikels 			= 	array( $artikels[$id] );
			$is_valid	=	true;
		}
		else
		{
			$is_niet_valid	=	true;
		}	
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
	.artikels{
		
		width:	1024px;
			margin:	0 auto;
	}
	
	img
		{
			max-width: 100%;
		}
	.img_tonen{
		max-width: 40%;
	}
	.titel_tonen{
		 width: 500px;
		 margin-bottom: 10px;
            padding: 10px;
		background-color:azure;
           
	}
	.artikel_tonen{
		background-color:azure;
		
	}   
	.mijn_artikel
		{
			float:left;
			width:400px;
			margin:16px;
			padding:16px;
			box-sizing:border-box;
			background-color:azure;
		}

		

	
	
	</style>

</head>
<body>
	


<?php  foreach ($artikels as $row => $value): ?>
		<article class="<?php echo ( !$is_valid ) ? 'mijn_artikel': '' ; ?>">

   <h1 class="titel_tonen<?php echo ($value == $id) ? " titel_tonen" : ""?>"> <?= $value['titel']; ?> </h1>
	 

   <div class="img_tonen<?php echo ($value == $id) ? " img_tonen" : ""?>"> <img src= <?php echo 'img/' . $value['afbeelding']; ?> alt= <?= $value['afbeeldingBeschrijving'] ; ?></div>
	<p> <?=  $value['afbeeldingBeschrijving']; ?> 	</p>
		<?php if(!$is_valid): ?>
		<p><?php echo substr( $value['inhoud'], 0, 50 ) ?>...</p>
		<?php else : ?>
		<p class="artikel_tonen<?php echo ($value == $id) ? " artikel_tonen" : ""?>"><?php echo $value['inhoud'] ?></p>
	   	
		
		<?php endif ?>
		
		
				 <a href="1-opdracht-get.php?id=<?php echo $row ?>" ><p><?php if($is_valid): ?>
		<p><?php echo substr( $value['lees'], 0, 0 ) ?></p>
		<?php else : ?>
		<p><?php echo $value['lees'] ?>...</p>
		<?php endif ?></p></a>
		
			</div>
</article>
	<?php endforeach ?>


</body>
</html>