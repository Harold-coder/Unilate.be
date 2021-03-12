<?php 

if (isset($_POST['reset-request-submit'])) {
	
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	$url = "unilate.be/newMdp.php?selector=".$selector."&validator=".bin2hex($token)."";

	$expires = date("U") + 600;

	require 'includes/dbh.inc.php';

	$userEmail = $_POST['email'];

	$sql = "DELETE FROM pwdReset WHERE pwdResetEmail =?;";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "Ligne 20 resetMdp.php";
		exit();
	}

	else{
		mysqli_stmt_bind_param($stmt, "s", $userEmail);
		mysqli_stmt_execute($stmt);
	}

	$sql2 = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES(?, ?, ?, ?);";

	if (!mysqli_stmt_prepare($stmt, $sql2)) {
		echo "Ligne 32 resetMdp.php";
		exit();
	}

	else{
		$hashedToken = password_hash($token, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
		mysqli_stmt_execute($stmt);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);

	$to = $userEmail;

	$subject = 'Mot de passe Unilate Oublié';

	$message = "<p> Nous avons reçu une demande de réinitialisation du mot de passe Unilate.
	Si vous n'avez pas fait cette demande, vous pouvez ignorer cet email.</p>";

	$message .= "<p> Voici le lien pour réinitialiser votre mot de passe: <br>";
	$message .= "<a href='".$url."'>".$url."</a></p>";

	$headers = "From: Unilate <haroldghini@gmail.com> \r\n ";
	$headers .= "Reply-To: haroldghini@gmail.com\r\n";
	$headers .= "Content-type: text/html\r\n";

	mail($to, $subject, $message, $headers);

	header("location: oubli.php?reset=success");

}

else{ // Si le mec est pas arrivé la en ayant appuyé sur confirmer
	header("location: oubli.php");
}