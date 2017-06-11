<?php 
include('include/header.php');
include('include/bddconnect.php'); 
?>

	<div class = "bloc_cible_formulaire">

		<?php

			if(!empty($_SESSION['user'])) { header('location:se_connecter.php'); }

				if(!empty($_POST['newmdp1']) AND !empty($_POST['newmdp2'])) {
					$newmdp1 = sha1($_POST['newmdp1']);
					$newmdp2 = sha1($_POST['newmdp2']);

						if($newmdp1 == $newmdp2) {
							$insert_modif_mdp = $bdd->prepare("UPDATE client SET password = ? WHERE email = ?");
							$insert_modif_mdp->execute(array($newmdp2, $_SESSION['flash']['email_mdp']));
							$message = 'Votre mot de passe à bien été modifié, vous allez être redirigé dans quelques secondes, si vous ne voulez pas attendre
										<br/> cliquer <a href ="mon_compte.php?page=compte">ici</a> Pour retourner à l\'accueil';
							unset($_SESSION['flash']['email_mdp']);

						} else { 
							$erreur = 'Vos mots de passe ne sont pas identiques !';
						}
			} else {
				$erreur = 'Tout les champs du formulaire doivent être remplis !';
			}


				if (isset($erreur)) {
					$_SESSION['erreur'] = $erreur;
					$_SESSION['post'] = $_POST;

				} else { 
					echo $message;
					header('refresh:3;se_connecter.php');
				}
		?>

	</div>

<?php include('include/footer.php'); ?>	