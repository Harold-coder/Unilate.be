<?php

if (isset($_POST["submit"])) {
	
	require_once 'includes/dbh.inc.php'; // connection to data base

	$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
	$nom = mysqli_real_escape_string($conn,$_POST['nom']);
	$adresse = mysqli_real_escape_string($conn,$_POST['adresse']);
	$cp = mysqli_real_escape_string($conn,$_POST['cp']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$mdp = mysqli_real_escape_string($conn,$_POST['mdp']);
	$mdpRepeat = mysqli_real_escape_string($conn,$_POST['mdpRepeat']);
	$tel = mysqli_real_escape_string($conn,$_POST['tel']);

	    
	require_once 'functions.inc.php';     // connection to functions that check inputs

	if (emptyInputSignup($prenom, $nom, $adresse, $cp, $email, $mdp, $mdpRepeat, $tel) !== false) {
		header("location: inscriptionv0.9.php?error=emptyInput");
		exit();
	}
	if (invalidName($prenom) !== false) {
		header("location: inscriptionv0.9.php?error=invalidName");
		exit();
	}
	if (invalidName($nom) !== false) {
		header("location: inscriptionv0.9.php?error=invalidName");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: inscriptionv0.9.php?error=invalidEmail");
		exit();
	}
	if (pwdMatch($mdp, $mdpRepeat) !== false) {
		header("location: inscriptionv0.9.php?error=pwdMatch");
		exit();
	}
	if (emailExists($conn, $email) !== false) {
		header("location: inscriptionv0.9.php?error=emailTaken");
		exit();
	}

	/* 
	Penser à rajouter un truc qui check l'adresse (elle peut pas etre trop longue)
	Mettre un truc qui check le Code Postal (pas plus de 4 chiffres)
	Verifier que mdp assez long
	*/

	createMedecin($conn, $nom, $prenom, $email, $tel, $adresse, $cp, $mdp);




}

else{
	header("location: inscriptionv0.9.php");
	exit();
}