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
		width: 200px;
		display: inline-block;
		float: left;
		
	}
	
	img{
		width: 200px;
		
	}
	
	</style>

</head>
<body>
	<div class="artikels">

<?php foreach ($artikels as $row => $value): ?>
		<div class="artikels">
   <h1> <?= $value['titel']; ?> </h1>

     <img src= <?php echo 'img/' . $value['afbeelding']; ?> alt= <?= $value['afbeeldingBeschrijving'] ; ?>
	<p> <?=  $value['afbeeldingBeschrijving']; ?> 	</p>
		<?php if(!$is_valid): ?>
		<p><?php echo substr( $value['inhoud'], 0, 50 ) ?>...</p>
		<?php else : ?>
		<p><?php echo $value['inhoud'] ?></p>
		<?php endif ?>
		
		
				 <a href="1-opdracht-get.php?id=<?php echo $row ?>" ><p><?php if($is_valid): ?>
		<p><?php echo substr( $value['lees'], 0, 0 ) ?></p>
		<?php else : ?>
		<p><?php echo $value['lees'] ?>...</p>
		<?php endif ?></p></a>
		
			</div>
	
	<?php endforeach ?>


</body>
</html>