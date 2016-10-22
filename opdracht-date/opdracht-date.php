<?php 

$jaar= date("d-F-Y",mktime(0, 0, 0, 01, 21, 1904));
$tijd	=	mktime(22, 35, 25, 0, 0, 0);
$datum=date('g:i:s A', $tijd);
//deel2
/* Set locale to Dutch */
   setlocale('LC_ALL', 'nld_nld');
    $tijds = mktime(22, 35, 25, 01, 21, 1904); 
   // $datums = strftime('%d %B %Y, %X', $tijd);
  $datums  = strftime('%d %B %Y, %H:%M:%S ', $tijds);


  

?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>


	<p> <?php echo $jaar  ?>, <?php echo $datum  ?> </p>
 <p>  <?php echo $datums  ?>  </p>

</body>
</html>