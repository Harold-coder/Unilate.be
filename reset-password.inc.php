<?php 


if (isset($_POST["reset-password-submit"])) {
	
	$selector = $_POST["selector"];
	$validator = $_POST["validator"];
	$password = $_POST["pwd"];
	$passwordRepeat = $_POST["pwd-repeat"];

	if (empty($password) || empty($passwordRepeat)) {
		header("location: connexionv0.9.php?newMdp=empty");
		exit();
	}

	elseif ($password != $passwordRepeat) {
		header("location: connexionv0.9.php?newMdp=notMatching");
		exit();
	}

	$currentDate = date("U");

	require 'includes/dbh.inc.php';

	$sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?;";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "Ligne 29 reset-password.inc.php";
		exit();
	}

	else{
		mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		if (!$row = mysqli_fetch_assoc($result)) {
			echo"Faut recommencer bro sorry";
			exit();
		}
		else{
			$tokenBin = hex2bin($validator);
			$tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

			if ($tokenCheck == false) {
				echo "T'as chié dans la colle";
				exit();
			}
			elseif ($tokenCheck == true) {
				$tokenEmail = $row['pwdResetEmail'];

				$sql = "SELECT * FROM medecin WHERE email = ?;";

				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "Ligne 58 reset-password.inc.php";
					exit();
				}
				else{
					mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					if (!$row = mysqli_fetch_assoc($result)) {
						echo"Faut recommencer bro sorry";
						exit();
					}
					else{
						$sql = "UPDATE medecin SET motDePasse=? WHERE email=?;";
						$stmt = mysqli_stmt_init($conn);

						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo "Ligne 74 reset-password.inc.php";
							exit();
						}
						else{
							$newPwdHash = password_hash($password, PASSWORD_DEFAULT);
							mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
							mysqli_stmt_execute($stmt);

							// On delete le token
							$sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?;";
							$stmt = mysqli_stmt_init($conn);

							if (!mysqli_stmt_prepare($stmt, $sql)) {
								echo "Ligne 87 reset-password.inc.php";
								exit();
							}
							else{
								mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
								mysqli_stmt_execute($stmt);

								header("location: connexionv0.9.php?newMdp=pwdUpdated");
							}


						}


					}// Fini Else

				}

			}// Fini elseif de tokenCheck

		}
	}// Fini le else en ligne 32
}// Fini le premier IF

else{
	header("location: oubli.php");
}







?>