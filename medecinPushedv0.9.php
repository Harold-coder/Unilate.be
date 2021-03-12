<?php 

	session_start();
	include_once 'includes/dbh.inc.php';


	if(isset($_SESSION['userid'])){

		$id = mysqli_real_escape_string($conn, $_GET['id']); 

		if ($id == $_SESSION['userid']) {

			$emptyMinutes="";
			if (isset($_GET['error'])){
				if ($_GET['error'] == "emptyMinutes") {
					$emptyMinutes = "T'as pas indiqué les minutes frérot";
				}
			}

			if (isset($_POST['Envoyer'])) {

				if (isset($_POST['retardMedecin'])){
					$minutes = mysqli_real_escape_string($conn, $_POST['retardMedecin']);
					
					$sql = "UPDATE medecin SET minutes = $minutes WHERE id=$id; ";
					mysqli_query($conn, $sql);
				}

				if (isset($_POST['trancheMaximum']) && isset($_POST['trancheMinimum'])){
					$trancheMaximum = mysqli_real_escape_string($conn, $_POST['trancheMaximum']);
					$trancheMinimum = mysqli_real_escape_string($conn, $_POST['trancheMinimum']);
					$sql2 = "UPDATE medecin SET trancheMaximum = $trancheMaximum, trancheMinimum = $trancheMinimum WHERE id=$id;";
					mysqli_query($conn, $sql2);
				}
				else{
					// IF DID NOT SPECIFY, set for whole day
					$sql3 = "UPDATE medecin SET trancheMaximum = 100, trancheMinimum = 97 WHERE id=$id;";
					mysqli_query($conn, $sql3);
				}


			} // END OF ISSET ENVOYER




			$emptyMinutes="";
			if (isset($_GET['error'])){
				if ($_GET['error'] == "emptyMinutes") {
					$emptyMinutes = "T'as pas indiqué les minutes frérot";
				}
			}

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

				$debutAnnonce = "";
				
				$minutesAnnoncees = $row['minutes'];
				if ($minutesAnnoncees == 0) {
					$minutesAnnoncees = "";
					$debutAnnonce = "Vous n'annoncez pas";
				}
				else{
					$minutesAnnoncees .= " minutes";
					$debutAnnonce = "Vous annoncez ";
				}
				
				$trancheMinAnnoncee = $row['trancheMinimum'];
				$trancheMinAnnoncee .= "h et ";
				$trancheMaxAnnoncee = $row['trancheMaximum'];
				$trancheMaxAnnoncee .= "h";


				$debutAnnonceTranche = "";
				if ($row['trancheMaximum'] == 100) {
					$trancheMaxAnnoncee = "";
					$trancheMinAnnoncee = "";
					$debutAnnonceTranche = "Durant toute la journée";
				}
				else{
					$debutAnnonceTranche = "Pour les patients entre ";
				}
			}


			include 'medecinv0.9.php';
			
			}

			else{
				echo "Tu n'es pas sur la bonne page petit baragouiner";
			}
	}


	else{
		header("location: connexionv0.9.php");
		exit();
	}
	