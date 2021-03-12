<?php

	include_once 'includes/dbh.inc.php';

	if (isset($_POST['seConnecter'])) {
		

		$emailConnexion = mysqli_real_escape_string($conn,$_POST['email']);
		$mdpConnexion = mysqli_real_escape_string($conn,$_POST['mdp']);

		require_once 'includes/dbh.inc.php';
		require_once 'functions.inc.php';

		if (emptyInputLogin($emailConnexion, $mdpConnexion) !== false) {
			header("location: connexionv0.9.php?error=emptyInput");
			exit();
		}

		loginUser($conn, $emailConnexion, $mdpConnexion);
		
	}

	else{
		header("location: connexionv0.9.php");
		exit();
	}













 /*
	

	$emailConnexion = $_POST['email'];
	$mdpConnexion = $_POST['mdp'];


	$sql = "SELECT id FROM medecin WHERE email='".$emailConnexion."' AND motDePasse='".$mdpConnexion."'; ";
	$result = mysqli_query($conn, $sql);
	$queryResult = mysqli_num_rows($result);

	if ($queryResult == 1){
		while($row = mysqli_fetch_assoc($result)){

			$id = $row['id'];

			$sql9 = "SELECT * FROM medecin WHERE id=$id;";
			$result = mysqli_query($conn, $sql9);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0){
				$row = mysqli_fetch_assoc($result);

				$nom = $row['nom'];
				$prenom = $row['prenom'];
				$email = $row['email'];
				$tel = $row['telephone'];
				$cp = $row['codePostal'];
				$adresse = $row['adresse'];
			}


			include 'medecinv0.8.php';
		}
	}

	else 
		echo "Mot de passe incorrecte ou email incorrecte";





*/

