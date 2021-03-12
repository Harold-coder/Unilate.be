<?php

	include_once 'includes/dbh.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Page d'inscription</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Crete+Round">
	<link rel="stylesheet" type="text/css" href="inscriptionv0.9.css?v=<?php echo time(); ?>">
	<script src="https://use.fontawesome.com/b38a0369b7.js"></script>
</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<div id="titre" class="container">
			<div class="col-sm-12 col-md-12 col-lg-12">
			
				<a href="Accueilv0.8.php"><h1 class="float-left" id="Gros-titre">Unilate</h1></a>
				
					<a href="connexionv0.9.php" class="float-right" id="pright">Je suis medecin</a>
	
			</div>

		</div>	
	</nav>
	  <section id="section1">
         <div class="container">
             <h3>Inscription  </h3>
             <form class="needs-validation" novalidate method="post" action="inscriptionPushedv0.9.php" role="form" enctype="multipart/form-data">
                 <div class="row g-3">
                     <div class="col-md-4 mb-3">
                         <label for="prenom">Prénom</label>
                         <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Florentin" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                     <div class="col-md-4 mb-3">
                         <label for="nom">Nom de famille</label>
                         <input type="text" class="form-control" id="nom" name="nom" placeholder="Denis" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                     <div class="col-md-4 mb-3">
                         <label for="email">E-mail</label>
                         <input type="text" class="form-control" id="email" name="email" placeholder="Exemple@hotmail.com" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                 </div>
                 <div class="row g-3">
                     <div class="col-md-3 mb-3">
                         <label for="tel">Telephone</label>
                         <input type="number" class="form-control" id="tel" name="tel" placeholder="+32 497 35 86 07" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                     <div class="col-md-6 mb-3">
                         <label for="Adresse">Adresse</label>
                         <input type="text" class="form-control" id="Adresse" name="adresse" placeholder="Adresse" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                     <div class="col-md-3 mb-3">
                         <label for="cp">Code postal</label>
                         <input type="number" class="form-control" id="cp" name="cp" placeholder="Code postal" maxlength="4" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                </div>
                   <div class="row g-3">
                     <div class="col-md-6 mb-3">
                         <label for="mdp">Mot de passe</label>
                         <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                     <div class="col-md-6 mb-3">
                         <label for="mdp">Validation du mot de passe</label>
                         <input type="password" class="form-control" id="mdp" name = "mdpRepeat" placeholder="Mot de passe" required>
                         <div class="valid-feedback">Ok !</div>
                         <div class="invalid-feedback">Valeur incorrecte</div>
                     </div>
                     
                     
                 </div>
                 <div class="form-group">
                     <div class="form-check">
                       <input class="form-check-input" type="checkbox" value="" id="cgu" required>
                       <label class="form-check-label" for="cgu">J'accepte les conditions générales d'utilisation et de vente</label>
                       <div class="invalid-feedback">Vous devez accepter les CGU pour continuer</div>
                     </div>
                 </div>

				<?php
                if (isset($_GET['error'])) {
                    if (mysqli_real_escape_string($conn,$_GET['error']) == 'emptyInput') {
                        echo "<p class='reponse'>Remplis tous les champs stp bro</p>";
                    }
                    else if (mysqli_real_escape_string($conn,$_GET['error']) == 'invalidName') {
                        echo "<p class='reponse'>Donne moi un nom valide stp frerot</p>";
                    }
                    else if (mysqli_real_escape_string($conn,$_GET['error']) == 'invalidEmail') {
                        echo "<p class='reponse'>Frerot c'est quoi cet email?</p>";
                    }
                    else if (mysqli_real_escape_string($conn,$_GET['error']) == 'pwdMatch') {
                        echo "<p class='reponse'>Tu sais pas mettre deux fois le mot de passe frerot concentre toi</p>";
                    }
                    else if (mysqli_real_escape_string($conn,$_GET['error']) == 'emailTaken') {
                        echo "<p class='reponse'>Cet email a deja ete utilisé</p>";
                    }
                    else if (mysqli_real_escape_string($conn,$_GET['error']) == 'none') {
                        echo "<p class='reponse'>Tout a correctement fonctionné! </p>";
                    }
                    else{
                    	echo "Tu joues avec mes couilles toi";
                    }
                }


            ?>

                 
                 
            
                 <div id="boutton">
     		         	<input class="button" type="submit" name = "submit" id='submit' value='Envoyer'/>
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
	<script>
           /*La fonction principale de ce script est d'empêcher l'envoi du formulaire si un champ a été mal rempli
            *et d'appliquer les styles de validation aux différents éléments de formulaire*/
            (function() {
             'use strict';
             window.addEventListener('load', function() {
               let forms = document.getElementsByClassName('needs-validation');
               let validation = Array.prototype.filter.call(forms, function(form) {
                 form.addEventListener('submit', function(event) {
                   if (form.checkValidity() === false) {
                     event.preventDefault();
                     event.stopPropagation();
                   }
                   form.classList.add('was-validated');
                 }, false);
               });
             }, false);
           })();
         </script>

</body>
</html>