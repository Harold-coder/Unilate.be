<?php 
	include_once 'dbh.inc.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Unilate Accueil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Crete+Round">
	<link rel="stylesheet" type="text/css" href="Accueilv0.8.css?v=<?php echo time(); ?>">
	<script src="https://use.fontawesome.com/b38a0369b7.js"></script>

</head>
<body>

	<nav class="navbar fixed-top navbar-light bg-light">
		<div id="titre" class="container">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			
				<h1 class="float-left" id="Gros-titre">Unilate</h1>
				
					<a href="connexionv0.9.php"  id="pright">Je suis medecin</a>
	
			</div>

		</div>	
	</nav>
	<section id="section1">
		<div class="container">
			<h1 id="firsth">Votre temps est<br> précieux?</h1>
			<p id="firstp">Gagnez du <strong>temps</strong> maintenant en verifiant si <br>votre medecin est à l'heure.</p>
		
			<form action="searchFoundv0.9.php" method="POST">
				<input type="text" name="search" placeholder="Nom de votre medecin">
				<input class="medecin" type="submit" id='submit' name="submit-search" value='Vérifier son retard' />
			</form>
				
			
			
		</div>

		
	</section>
	<section id="section2">
		<div class="container-fluid">
			<div class="heading">
					<h2>Quels sont les principaux praticiens concernés</h2>
					<p id="secondp">L'objectif d'Unilate est de venir en aide aux praticiens qui contre leurs bonnes volontés<br> ne peuvent toujours respectés les heures prévu du rendez vous, et aux clients dont<br> le temps dans une journée est parfois précieux.<br> </p>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-12"> 
				<div class="moncarousel">
				<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
				  <div class="carousel-indicators">
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6" aria-label="Slide 7"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="7" aria-label="Slide 8"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="8" aria-label="Slide 9"></button>
				    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="9" aria-label="Slide 10"></button>
				  </div>
				  <div class="carousel-inner">
				    <div class="carousel-item active" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="200">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Les medecins généralistes</h5>
				       <p>Votre medecin généraliste n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
							
				      </div>
				    </div>
				    <div class="carousel-item" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Les dentistes</h5>
							<p>Votre dentistre n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
				      </div>
				    </div>
				     <div class="carousel-item" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Les gynécologues</h5>
							<p>Votre gynécologue n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
				      </div>
				    </div>
				    <div class="carousel-item" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Les ophtalmologues</h5>
							<p>Votre ophtalmologue n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
				      </div>
				    
				  </div>
				  <div class="carousel-item" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Les kinésithérapeute</h5>
							<p>Votre kiné n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
				      </div>
				    </div>
				    <div class="carousel-item" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Les orthodentistes</h5>
							<p>Votre orthodentiste n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
				      </div>
				    </div>
				    <div class="carousel-item" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Les osthéopathes</h5>
							<p>Votre osthéopathe n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
				      </div>
				 	  </div>
				    <div class="carousel-item" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Chirurgiens</h5>
							<p>Votre chirurgien n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
				      </div>
				    </div>
				    <div class="carousel-item" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Psychologues</h5>
							<p>Votre psychologue n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
				      </div>
				    </div>
				    <div class="carousel-item" data-bs-interval="4000">
				      <img src="image-violet.jpg" class="d-block w-100" alt="100">
				      <div class="carousel-caption d-none d-md-block">
				       <h5>Neurologues</h5>
							<p>Votre neurologue n'est pas encore associé à Unilate ? N'hésitez pas à lui en parler !</p>
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
	</div>
</section>	
	<section id="section3">
		<div class="container">
			<h2>Pourquoi utiliser Unilate ?</h2>
				<p id="secondp">Unilate est à la disposition du medecin qui respect ses clients,<br> celui qui te prévient quand il a du retard, celui qui est la pour te faire gagner du temps<br> alors profites-en ! </p>
			<div class="row">
				<div class="paire col-xs-7 col-sm-8 col-md-3 col-lg-3 para" id="first" data-value="1" >
					<h3 class="sec3h">Gagnez un temps monstre</h3>
					<p class="sec3p">N'attendez plus dans une salle d'attente pendant des durées indeterminés,<br> renseignez-vous à l'avance avec Unilate.
					
				</div>
				
				<div class="paire col-sm-8 col-md-3 col-lg-3 para" id="second" data-value="2" >
					
					<h3 class="sec3h">24,6% des patients seraient reçus à l'heure.</h3>
					<p class="sec3p">Cette stat nous viens de l association Consommation Logement Cadre de Vie. Dorénavant arrivez a l'heure 100% du temps avec Unilate.</p>
				</div>
				
				<div class="paire col-sm-8 col-md-3 col-lg-3 para" id="third" data-value="3" >
					 <h3 class="sec3h">Pourquoi le client du medecin est il un "patient" ?</h3>
					<p class="sec3p">Vous avez la réponse ? Unilate est, on l'éspère, votre solution.</p>
				</p>
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
	<script type="text/javascript">
		
		var activated = 1; 

		var p1 = document.getElementById('first');
		var p2 = document.getElementById('second');
		var p3 = document.getElementById('third');




		if (activated == 1){
			FonctionPardefaut(p1);
		}


		p1.addEventListener('mouseover',Fonction1);
		p2.addEventListener('mouseover',Fonction1);
		p3.addEventListener('mouseover',Fonction1);
		





		function FonctionPardefaut(p1){
			p1.style.background = '#1A8EFF';
			p1.style.color = 'white';
			p1.style.fontSize = '1.5em';
			p1.style.paddingTop ='40px';
		}

		function Fonction1(){
			this.style.background = '#1A8EFF';
			this.style.color = 'white';
			this.style.fontSize = '1.5em';
			this.style.paddingTop ='40px';
			if (this.getAttribute('data-value') != "1"){
				ResetParDefaut(p1);
			}
			if (this.getAttribute('data-value') != "2"){
				ResetParDefaut(p2);
			}
			if (this.getAttribute('data-value') != "3"){
				ResetParDefaut(p3);
			}




		}

		function ResetParDefaut(p1){
			p1.style.background = 'white';
			p1.style.color = 'black';
			p1.style.fontSize = '';
			p1.style.paddingTop ='';
		} 

		

		
		
	</script > 
</body>
</html>
