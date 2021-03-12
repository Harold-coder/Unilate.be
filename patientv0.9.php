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
	<link rel="stylesheet" type="text/css" href="patientv0.9.css?v=<?php echo time(); ?>">
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
			<table>
				<tr>
					<th>Prénom:</th>
					<td><?php echo "$prenom"?></td>
				</tr>
				<tr>
					<th>Nom:</th>
					<td><?php echo "$nom"?></td>
				</tr>
				<tr>
					<th>E-mail:</th>
					<td><?php echo "$email"?></td>
				</tr>
				<tr>
					<th>Telephone:</th>
					<td><?php echo "$tel"?></td>
				</tr>
				<tr>
					<th>Adresse:</th>
					<td><?php echo "$adresse"?></td>
				</tr>
				<tr>
					<th>Code Postal:</th>
					<td><?php echo "$cp"?></td>
				</tr>
			</table>
	
			<div class="right">
				<h1 class="firsth">Heure du rendez-vous :</h1>
					<div>
						<form method="post" action="patientPushedv0.9.php?id=<?php echo $id; ?>">
						<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="retardSelectionne">
							<option value = "">--Selectionner l'heure adéquate--</option>
							<option value="9">9h00</option>
							<option value="10">10h00</option>
							<option value="11">11h00</option>
							<option value="12">12h00</option>
							<option value="13">13h00</option>
							<option value="14">14h00</option>
							<option value="15">15h00</option>
							<option value="16">16h00</option>
							<option value="17">17h00</option>
							<option value="18">18h00</option>
							<option value="19">19h00</option>
							<option value="20">20h00</option>
							<option value="21">21h00</option>
									
						</select>
					</div>	
					<div>	
						<input class="retard" type="submit" id='submit' value='Confirmer'>
					</div>
						</form>	
					<div id="reponse">
						<p class="rep" id="para1"><?php echo "$annonce"; ?></p>
						<?php 
							if (isset($_POST['retardSelectionne'])){
								if ($minutes > 0){
									echo "<p class='rep'>Votre medecin annonce <span class='red'>".$minutes." minutes</span> de retard.</p>";
								}
								else
									echo "<p class='rep' id='para1'>Votre médecin n'annonce pas de retard pour l'instant!</p>";
								
							}
						?>
						
					</div>	
			</div>
	</section>
	<section id="section2">
		<div class="container">
			<div class="heading">
				<h2 id="firsth2">Unilate vient en aide aux medecins</h2>
				<p id="secondp">L'objectif d'Unilate est de venir en aide aux medecins qui contre leurs bonnes volontés<br> ne peuvent toujours respectés les heures exact du rendez vous, ils peuvent<br> maintenant gérer les imprévus en restant ponctuel avec leurs clients.</p>
				</div>
				<div class="moncarousel">
				<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
				  <div class="carousel-indicators">
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
				  </div>
				  <div class="carousel-inner">
				    <div class="carousel-item active" data-bs-interval="5000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="...">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>75% des medecins en retard</h5>
							<p>D'après une récente étude de l'Association nationale de défense des consommateurs et usagers (CLCV), 75,4 % des médecins seraient régulièrement en retard sur leurs consultations.</p>
				      </div>
				    </div>
				    <div class="carousel-item" data-bs-interval="2000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>75% des medecins en retard</h5>
							<p>D'après une récente étude de l'Association nationale de défense des consommateurs et usagers (CLCV), 75,4 % des médecins seraient régulièrement en retard sur leurs consultations.</p>
				      </div>
				    </div>
				    <div class="carousel-item">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>75% des medecins en retard</h5>
							<p>D'après une récente étude de l'Association nationale de défense des consommateurs et usagers (CLCV), 75,4 % des médecins seraient régulièrement en retard sur leurs consultations.</p>
				      </div>
				    
				  </div>
				  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Previous</span>
				  </button>
				  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="visually-hidden">Next</span>
				  </button>
				</div>
			</div>	
		</div>
	</section>	
	<section id="section3">
		<div class="container">
			<h2 id="secondh2">Pourquoi utiliser Unilate ?</h2>
				<p id="secondp">Unilate est à la disposition du medecin qui respect ses clients,<br> celui qui te prévient quand il a du retard, celui qui est la pour te faire gagner du temps<br> alors profites-en ! </p>
			<div class="row">
				<div class="paire col-xs-7 col-sm-8 col-md-3 col-lg-3 para" id="box1">
					
					<h3 class="sec3h">Gagnez un temps monstre</h3>
					<p class="sec3p">N'attendez plus dans une salle d'attente pendant des durées indeterminés,<br> vous avez certainement mieux a faire.</p>
					
							
					
				</div>
				<div class="paire col-sm-8 col-md-3 col-lg-3 para" id="box2">
					
					<h3 class="sec3h">Gagnez un temps monstre</h3>
					<p class="sec3p">N'attendez plus dans une salle d'attente pendant des durées indeterminés,<br> vous avez certainement mieux a faire.</p>
					
				</div>
				<div class="paire col-sm-8 col-md-3 col-lg-3 para" id="box3" >
					<h3 class="sec3h">Gagnez un temps monstre</h3>
					<p class="sec3p">N'attendez plus dans une salle d'attente pendant des durées indeterminés,<br> vous avez certainement mieux a faire.</p>
					
				</div>
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

</body>
</html>
