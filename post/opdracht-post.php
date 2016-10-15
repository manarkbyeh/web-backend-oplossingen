<?php 
$password="Rutger12345";
$username="rutger";
$result="";
$message	=	 " ";

	if ( isset( $_POST ['submit'] ) )
	{
	
		if ( $_POST["email"] == $username || $_POST["email"] != "" && $_POST["password"] == $password || $_POST["password"] != "" )
		{
			$message	=	"Welkom";
		}	
		
		
		else
		{
			$message	=	"Er ging iets mis tijdens het inloggen. Probeer opnieuw.";
		}
	}
$result= $message . " " . $username;
?>


<body >

	<section >

		
		
		<form action="opdracht-post.php" method="post">

			<ul>
				<li>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email">
				</li>
				<li>
					<label for="password">Paswoord:</label>
					<input type="password" name="password" id="password">
				</li>
			</ul>

			<input type="submit" name="submit" value="Verzend">
		</form>
	
	<p><?php echo $result  ?></p>

	</section>

</body>
</html>