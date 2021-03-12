<?php 
	include_once 'includes/dbh.inc.php';
	session_start();
?>
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
	<link rel="stylesheet" type="text/css" href="searchFoundv0.9.css?v=<?php echo time(); ?>">
	<script src="https://use.fontawesome.com/b38a0369b7.js"></script>

</head>
<body>
	<nav class="navbar fixed-top navbar-light bg-light">
		<div id="titre" class="container">
			<div class="col-sm-12 col-md-12 col-lg-12">
			
				<a href="Accueilv0.8.php"><h1 class="float-left" id="Gros-titre">Unilate</h1></a>
				
				
				<?php 
					if (isset($_SESSION['userid'])) {
						$id = $_SESSION['userid'];
						echo'<a href="medecinPushedv0.9.php?id='.$id.'" class="float-right" id="pright">Annoncer du Retard</a>';
						echo '<a href="logOutv0.8.php" class="float-right" id="dec"><span id="logo2" class="fa fa-sign-out" aria-hidden="true"></span> Deconnexion </a>';
					}
					else
						echo '<a href="connexionv0.9.php" class="float-right" id="pright">Je suis medecin</a>';
				?>
	
			</div>

		</div>	
	</nav>
	<section id="section1">
		<div class="container">
			<h2 id="resultats">Résultats: </h2>
				<div class="medecins">


	<?php 

	function verifyInput($var){
	$var = trim($var);
	$var = stripslashes($var);
	$var = htmlspecialchars($var);
	return $var;
	}





	if (isset($_POST['submit-search'])){
		
		$searchWithSpaces = mysqli_real_escape_string($conn, $_POST['search']);
		$searchWithSpaces .= " ";
		$splitSearch = explode(' ', $searchWithSpaces);
		
		$search1 = $splitSearch[0];
		$search1 = mysqli_real_escape_string($conn, $search1);

		$search1 = verifyInput($search1);

		$search2 = $splitSearch[1];
		$search2 = mysqli_real_escape_string($conn, $search2);
		$search2 = verifyInput($search2);
		
		// Prend tous les médecins correspondant au premier mot clé
		$sql = "SELECT * FROM medecin WHERE nom LIKE '%".$search1."%' OR prenom LIKE '%".$search1."%' OR codePostal LIKE '%".$search1."%' ;";
		$result1 = mysqli_query($conn, $sql);
		$queryResult1 = mysqli_num_rows($result1);

		$queryResult2 = 0;


		// Si il y a un deuieme mot clé ca prend tous les médecins du deuxieme
		if($search2 != ''){
			$sql2 = "SELECT * FROM medecin WHERE nom LIKE '%".$search2."%' OR prenom LIKE '%".$search2."%' OR codePostal LIKE '%".$search2."%';";
			$result2 = mysqli_query($conn, $sql2);
			$queryResult2 = mysqli_num_rows($result2);
			
		}

		// Ca reprend tous les médecins du premier mot clé pour checker plus tard
		$sql1Bis = "SELECT * FROM medecin WHERE nom LIKE '%".$search1."%' OR prenom LIKE '%".$search1."%' OR codePostal LIKE '%".$search1."%' ;";
		$result1Bis = mysqli_query($conn, $sql1Bis);



		$queryResultTotal = $queryResult1 + $queryResult2;
		if ($queryResultTotal > 0){
			// On s'en ballec
		}

		else 
			echo "Pas de medecin trouvé... sorry frérot, tape un vrai blaze ou demande a ton medecin d'utiliser Unilate.";

		if($queryResult1 > 0){
			while ($row1 = mysqli_fetch_assoc($result1)) {
			echo "<a  href='patientPushedv0.9.php?id=".$row1['id']."'>
						<div class='paire col-xs-7 col-sm-8 col-md-8 col-lg-8 para'>
						
									<h3>".$row1['prenom']." ".$row1['nom']."</h3>
									<p class='rue'>".$row1['adresse']."</p>
								</a>
						</div>";
		}
		}

		if($queryResult2 > 0){
			while ($row2 = mysqli_fetch_assoc($result2)) {
				$checkDouble = 1;
				if ($queryResult1 > 0){
					
					while ($row1Bis = mysqli_fetch_assoc($result1Bis)){
						if ($row1Bis['id'] == $row2['id'])
							$checkDouble = 0;
					}
					mysqli_data_seek($result1Bis, 0);
				}


				if ($checkDouble == 1){
					echo "<a  href='patientPushedv0.9.php?id=".$row2['id']."'>
						<div class='paire col-xs-7 col-sm-8 col-md-8 col-lg-8 para'>
						
									<h3>".$row2['prenom']." ".$row2['nom']."</h3>
									<p class='rue'>".$row2['adresse']."</p>
								</a>
						</div>";
				}
				
		}
		}
	
	}

?>





					

					
			</div>
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