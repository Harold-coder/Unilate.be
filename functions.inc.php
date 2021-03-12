<?php

function emptyInputSignup($prenom, $nom, $adresse, $cp, $email, $mdp, $mdpRepeat, $tel){

	$result;
	if (empty($prenom) || empty($nom) || empty($adresse) || empty($cp) || empty($mdp) || empty($mdpRepeat) || empty($email) || empty($tel)) {
		$result = true;
	}
	else
		$result = false;

	return $result;
}


function invalidName($name){

	$result;
	
	if (!preg_match("/^[a-zA-Z0-9\s]*$/", $nameCheck)) {
		$result = true;
	}
	else
		$result = false;

	return $result;
}

function invalidEmail($email){

	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else
		$result = false;

	return $result;
}

function pwdMatch($mdp, $mdpRepeat){

	$result;
	if ($mdp !== $mdpRepeat) {
		$result = true;
	}
	else
		$result = false;

	return $result;
}

function emailExists($conn, $email){

	// This is to make sure nobody injects anything in our data base
	$sql = "SELECT * FROM medecin WHERE email = ?;";
	$stmt = mysqli_stmt_init($conn); // This is a prepared statement

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: inscriptionv0.8.php?error=stmtFailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);

}



function createMedecin($conn, $nom, $prenom, $email, $tel, $adresse, $cp, $mdp ){

	// This is to make sure nobody injects anything in our data base
	$sql = "INSERT INTO medecin (nom, prenom, email, telephone, adresse, codePostal, motDePasse) VALUES (?,?,?,?,?,?,?);";
	$stmt = mysqli_stmt_init($conn); // This is a prepared statement

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: inscriptionv0.8.php?error=stmtFailed");
		exit();
	}

	$hashedMdp = password_hash($mdp, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sssisis", $nom, $prenom, $email, $tel, $adresse, $cp, $hashedMdp);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: inscriptionv0.9.php?error=none");
	exit();

}


function emptyInputLogin($emailConnexion, $mdpConnexion){

	$result;
	if (empty($emailConnexion) || empty($mdpConnexion)) {
		$result = true;
	}
	else
		$result = false;

	return $result;
}

function loginUser($conn, $emailConnexion, $mdpConnexion){
	$emailExists = emailExists($conn, $emailConnexion);

	if ($emailExists === false){
		header("location: connexionv0.9.php?error=wrongEmail");
		exit();
	}

	
	$pwdHashed = $emailExists['motDePasse'];
	$checkMdp = password_verify($mdpConnexion, $pwdHashed);

	if ($checkMdp === false) {
		header("location: connexionv0.9.php?error=wrongMdp");
		exit();
	}
	else if ($checkMdp === true){
		session_start();
		$_SESSION['userid'] = $emailExists['id'];
		//header("location: Accueilv0.8.php");
		header("location: medecinPushedv0.9.php?id=".$_SESSION['userid']."");
		exit();
	}
}









