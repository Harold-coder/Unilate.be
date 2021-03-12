<!DOCTYPE html>
<html>
<head>
	<title>Unilate</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Crete+Round">
	<link rel="stylesheet" type="text/css" href="oubli.css?v=<?php echo time(); ?>">
	<script src="https://use.fontawesome.com/b38a0369b7.js"></script>
</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<div id="titre" class="container">
			<div class="col-sm-12 col-md-12 col-lg-12">
			
				<a href="Accueilv0.8.php"><h1 class="float-left" id="Gros-titre">Unilate</h1></a>
				
			</div>

		</div>	
	</nav>
	<section class="section1">
		<div class="container">
			<h2>Mot de passe oublié ?</h2>
			<div class="col-md-4 mb-3 email">

				<form action="resetMdp.php" method="post">

			 	<label for="email">Saisissez votre e-mail</label>
             	 <input type="text" name="email" class="form-control" id="email" placeholder="exemple@gmail.com" required>
             </div> 

             <?php 

			if (isset($_GET["reset"])) {
				if ($_GET["reset"] === "success") {
					echo "<p>Va checker tes mails bro</p>";
				}
			}
			else{
				echo "<p>Vous allez recevoir un e-mail pour re créer un mot de passe</p>";
			}

			?>


             <div id="button">        
				<input class="button" name="reset-request-submit" type="submit" id='submit' value='Confirmer' onclick="window.location.href='mail';" />
			 </div>

			</form>

			

		</div>
		
	</section>
	<footer>
		<div class="container-fluid">
				<h1 id="Unilate">Unilate</h1>
				<div class="copyright">Copyright 2021. Tous droits réservés.</div>
		</div>
	</footer>

</body>
</html>