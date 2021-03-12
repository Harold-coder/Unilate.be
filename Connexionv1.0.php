<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Crete+Round">
	<link rel="stylesheet" type="text/css" href="connexion.css">
	<script src="https://use.fontawesome.com/b38a0369b7.js"></script>
</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<div id="titre" class="container">
			<div class="col-sm-12 col-md-12 col-lg-12">
			
				<a href="accueil.html"><h1 class="float-left" id="Gros-titre">Unilate</h1></a>
				
					<a href="connexion.html" class="float-right" id="pright">Je suis medecin</a>
	
			</div>

		</div>	
	</nav>
	<section id="section1">
		<div class="container">
			<div class="formulaire">
				
			<form class="needs-validation" novalidate>
               <h2>Connexion</h2>
               	<div> 
               	 <label><b>E-mail</b></label>
               	 <input type="text" placeholder="Entrer votre e-mail" name="username" required>
               	 <div class="valid-feedback">Ok !</div>
               	 <div class="invalid-feedback">Valeur incorrecte</div>
               </div>
               <div>

              	  <label><b>Mot de passe</b></label>
              	  <input type="password" placeholder="Entrer le mot de passe" name="password" required>
              	  <div class="valid-feedback">Ok !</div>
             	   <div class="invalid-feedback">Valeur incorrecte</div>
               </div>
               <p class="reponse">Votre email ou mot de passe ne correspond pas.</p>
               <div>
            	    <input class="connexion" type="submit" id='submit' value='Se connecter' onClick="window.location.href='medecin.html';" / >
               </div>
               <div>
            	    <input class="inscription" type="submit" id='submit' value='Ouvrir un compte' onClick="window.location.href='inscription.html';" />
               </div>
                <a href="oubli.html" id="oublié">Mot de passe oublié ?</a>    

			</form>
			</div>
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
