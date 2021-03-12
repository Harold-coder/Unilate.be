<?php 
	
	$id = $_GET['id'];
	
	include_once 'includes/dbh.inc.php';

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

	function verifyInput($var){
		$var = trim($var);
		$var = stripslashes($var);
		$var = htmlspecialchars($var);
		return $var;
	}
	
	


	$annonce = "";
	$minutes ="";
	if(isset($_POST['retardSelectionne'])){
		$heure = verifyInput($_POST['retardSelectionne']);
		$annonce =  "Votre rdv est programmé à $heure h";
		//echo "$annonce" . "<br>";
		$sql = "SELECT * FROM medecin WHERE id=$id;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0){
			$row = mysqli_fetch_assoc($result);

			if ($row['trancheMaximum'] == "100"){
				$minutes = $row['minutes'];
			}

			elseif ($row['trancheMaximum'] >= $heure AND $heure >= $row['trancheMinimum']){
				$minutes = $row['minutes']; 
			}

			else
				$minutes = "0";
		}
	}


	include 'patientv0.9.php';