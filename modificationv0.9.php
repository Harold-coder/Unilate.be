<?php 

    include_once 'includes/dbh.inc.php';
    require 'functions.inc.php';

    session_start();

    if (isset($_SESSION['userid'])){

        $id = mysqli_real_escape_string($conn,$_GET['id']);

        if ($id == $_SESSION['userid']) {
            $error = "";

            if (isset($_GET['error'])){
                if ($_GET['error'] == 'wrongMdp') {
                    $error = "Mauvais ancien mot de passe";
                }
                if ($_GET['error'] == 'notMatchingMdp') {
                    $error = "Password not matching";
                }
            }
            


/*                     DEBUT DE LA MODIFICATION                                        */
            function changeDataString($data, $sqlChange, $conn){

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sqlChange)) {
                echo "Ca a bugé sorry";
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $data);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);            

            }
        

            function changeDataInteger($data, $sqlChange, $conn){

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sqlChange)) {
                    echo "Ca a bugé sorry";
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "i", $data);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);            

            }
            

            if (isset($_POST['submit'])) {
                if (!empty($_POST['prenom'])) {
                    $sqlChange = "UPDATE medecin  SET prenom = ? WHERE id=$id;";
                    $newPrenom = $_POST['prenom'];
                    changeDataString($newPrenom, $sqlChange, $conn);          

                }

                if (!empty($_POST['nom'])) {
                    $sqlChange = "UPDATE medecin  SET nom = ? WHERE id=$id;";
                    $newNom = $_POST['nom'];
                    changeDataString($newNom, $sqlChange, $conn);           

                }
                if (!empty($_POST['email'])) {
                    $sqlChange = "UPDATE medecin  SET email = ? WHERE id=$id;";
                    $newEmail = $_POST['email'];
                    changeDataString($newEmail, $sqlChange, $conn);           

                }
                if (!empty($_POST['tel'])) {
                    $sqlChange = "UPDATE medecin  SET tel = ? WHERE id=$id;";
                    $newTel = $_POST['tel'];
                    changeDataInteger($newTel, $sqlChange, $conn);           

                }
                if (!empty($_POST['adresse'])) {
                    $sqlChange = "UPDATE medecin  SET adresse = ? WHERE id=$id;";
                    $newAdresse = $_POST['adresse'];
                    changeDataString($newAdresse, $sqlChange, $conn);           

                }
                if (!empty($_POST['cp'])) {
                    $sqlChange = "UPDATE medecin  SET codePostal = ? WHERE id=$id;";
                    $newCp = $_POST['cp'];
                    changeDataInteger($newCp, $sqlChange, $conn);           

                }
                if (!empty($_POST['mdpNouveau'])) {
                    
                    $sqlMdp = "SELECT * FROM medecin WHERE id=$id;";
                    $result = mysqli_query($conn, $sqlMdp);
                    $row = mysqli_fetch_assoc($result);

                    $pwdHashed = $row['motDePasse'];
                    $checkMdp = password_verify($_POST['mdpAncien'], $pwdHashed);

                    if ($checkMdp === true) {
                        if ($_POST['mdpRepeat'] !== $_POST['mdpNouveau']){
                            header("location: modificationv0.9.php?id=$id&error=notMatchingMdp");
                            exit();
                        }
                    
                        $sqlChange = "UPDATE medecin  SET motDePasse = ? WHERE id=$id;";
                        $newMdp = $_POST['mdpNouveau'];
                        $hashedMdp = password_hash($newMdp, PASSWORD_DEFAULT);
                        changeDataString($hashedMdp, $sqlChange, $conn);    

                    } // End check if ancien mdp bon

                    else{
                        header("location: modificationv0.9.php?id=$id&error=wrongMdp");
                        exit();                        
                    }


                }
                    

            }          

            $sql = "SELECT * FROM medecin WHERE id=$id;";
            $result = mysqli_query($conn, $sql);
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
        
        } // END of If to check id

        else{
            header("location: baragouineurv0.9.php");
            exit();
        }


    } // END of big If SESSION 

    else{
        header("location: baragouineurv0.9.php");
        exit();
    }



?>



<!DOCTYPE html>
<html>
<head>
	<title>Unilate Modification</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Crete+Round">
	<link rel="stylesheet" type="text/css" href="modificationv0.9.css?v=<?php echo time(); ?>">
	<script src="https://use.fontawesome.com/b38a0369b7.js"></script>

</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<div id="titre" class="container">
			<div class="col-sm-12 col-md-12 col-lg-12">
			
				<a href="Accueilv0.8.php"><h1 class="float-left" id="Gros-titre">Unilate</h1></a>
				
					
	
			</div>

		</div>	
	</nav>
	   <section id="section1">
         <div class="container">
             <h3>Vos informations </h3>
           
           <form method="POST" action="modificationv0.9.php?id=<?php echo $id; ?>">
                 <div class="row g-2">
                     <div class="col-md-4 mb-3">
                         <label for="prenom"><?php echo "$prenom"; ?></label>
                         <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Modifier le prenom" >
                        
                     </div>
                     <div class="col-md-4 mb-3">
                         <label for="nom"><?php echo "$nom"; ?></label>
                         <input type="text" class="form-control" name="nom" id="nom" placeholder="Modifier le nom" >
                     
                     </div>
                    
                 </div>
                 <div class="row g-2">
                 	 <div class="col-md-4 mb-3">
                         <label for="email"><?php echo "$email"; ?></label>
                         <input type="text" class="form-control" name="email" id="email" placeholder="modifier le mail" >
                    
                     </div>
                     <div class="col-md-4 mb-3">
                         <label for="tel"><?php echo "$tel"; ?></label>
                         <input type="number" class="form-control" name="tel" id="tel" placeholder="modifier le numero" >
                       
                     </div>
              	</div>
              	<div class="row g-2">
                     <div class="col-md-4 mb-3">
                         <label for="Adresse"><?php echo "$adresse"; ?></label>
                         <input type="text" class="form-control" name="adresse" id="Adresse" placeholder="Modifier l'adresse" >
                         
                     </div>
                     <div class="col-md-4 mb-3">
                         <label for="cp"><?php echo "$cp"; ?></label>
                         <input type="number" class="form-control" name="cp" id="cp" placeholder="Modifier le code postal" maxlength="4" >
                     </div>
               	</div>
                   <div class="row g-2">
                     <div class="col-md-4 mb-3">
                         <label for="mdp">Modifier mot de passe</label>
                         <input type="password" class="form-control" name="mdpAncien" id="mdp" placeholder="Ancien mot de passe" >
                        
                     </div>
                     <div class="col-md-4 mb-3">
                         <label for="mdp">Nouveau mot de passe</label>
                         <input type="password" class="form-control" name="mdpNouveau" id="mdp" placeholder="Nouveau mot de passe" >
                        
                     </div>
                 </div>
                 <div class="row g-2">
                     <div class="col-md-4 mb-3">
                         <label for="mdp">Confirmer mot de passe</label>
                         <input type="password" class="form-control" name="mdpRepeat" id="mdp" placeholder="Confirmer nouveau mot de passe" >
                        
                     </div>
                 </div>


                <p class="reponse"><?php echo "$error" ?> </p>
              
               <div id="confirmer">
     				<input class="button" type="submit" name="submit" id='submit' value='Confirmer'  />
    	       </div>

            </form>

            




     </section>
     <footer>
		<div class="container-fluid">
				<h1 id="Unilate">Unilate</h1>
				<div class="copyright">Copyright 2021. Tous droits réservés.</div>
		</div>
	</footer>


</body>
</html>
