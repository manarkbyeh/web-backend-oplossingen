<?php 
	$cijfers		= 	array( 1,2,3,4,5);

$cijfers_reserve=array_reverse($cijfers, false);





?>
<html>
	<body>
		
 <ul>
         <?php foreach ($cijfers as $key => $value): ?>
            <li>[<?= $key ?>]: <?= $value ?></li>
         <?php endforeach ?>
      </ul>	
		 <ul>
		 <?php foreach ($cijfers_reserve as $key => $value): ?>
            <li>[<?= $key ?>]: <?= $value ?></li>
         <?php endforeach ?>
		 </ul>
		 <ul>
		 <?php foreach ($cijfers as $key => $value): ?>
			 <?php if( $value %2==1): ?> 
            <li>[<?= $key ?>]: <?= $value ?></li>
			  <?php endif ?>
         <?php endforeach ?>
		 </ul>	
		<ul>
         <?php foreach ($cijfers as $key => $value): ?>
            <li>
				Som van values met key [<?= $key ?>]: <?= ($value+$cijfers_reserve[$key]); ?>
			</li>
         <?php endforeach ?>
      </ul>	
			
	</body>
</html>