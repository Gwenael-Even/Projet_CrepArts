<?php 
include('include/header.php');
include('include/bddconnect.php'); 
?>

	<div class = "bloc_cible_formulaire">

		<?php

			if(empty($_SESSION['user'])) { header('location:se_connecter.php'); }

				if(!empty($_POST['ancienmdp']) AND !empty($_POST['newmdp1']) AND !empty($_POST['newmdp2'])) {
					$ancienmdp = sha1($_POST['ancienmdp']);
					$newmdp1 = sha1($_POST['newmdp1']);
					$newmdp2 = sha1($_POST['newmdp2']);

					$reqpass = $bdd->prepare("SELECT * FROM client WHERE password = ? AND Idclient = ? ");
					$reqpass->execute(array($ancienmdp, $_SESSION['user']['Idclient']));
					if ($ancienmdp == $_SESSION['user']['password']) {

						if($newmdp1 == $newmdp2) {
							$insert_modif_mdp = $bdd->prepare("UPDATE client SET password = ? WHERE Idclient = ?");
							$insert_modif_mdp->execute(array($newmdp2, $_SESSION['user']['Idclient']));
							$message = 'Votre mot de passe à bien été modifié, vous allez être redirigé dans quelques secondes, si vous ne voulez pas attendre
											<br/> cliquer <a href ="mon_compte.php?page=compte">ici</a> Pour retourner à l\'accueil';
							$_SESSION['user']['password'] = $newmdp1;

						} else { $erreur = 'Vos mots de passe ne sont pas identiques !';
						}

					} else {
						$erreur = 'Mauvais mot de passe !';
		 
					}

				} else {
					$erreur = 'Tout les champs du formulaire doivent être remplis !';
				}

			

				if (isset($erreur)) {
					echo $erreur;
					header("refresh:3;mon_compte.php?page=compte");

				} else { echo $message; }
		?>

	</div>

<?php include('include/footer.php'); ?>	