<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>

	<div class = "bloc_cible_formulaire">

		<?php 
		
			if (!empty($_SESSION['user'] {

				if(!empty($_POST['modifemail']) AND !empty($_POST['modifemail2'])) {

					$modifemail = htmlspecialchars($_POST['modifemail']);
					$modifemail2 = htmlspecialchars($_POST['modifemail2']);
					$taille_email = strlen($modifemail);

					if ($taille_email <= 50) {

						if (filter_var($modifemail2, FILTER_VALIDATE_EMAIL)) {

							if ($modifemail2 != $modifemail) {
								$reqmail = $bdd->prepare("SELECT * FROM client WHERE email = ?");
								$reqmail->execute(array($modifemail2));
								$mailexist = $reqmail->rowCount(); //Verification de l'existence de l'email, si égale à 0, l'email n'existe pas encore dans la base de données.

								if ($mailexist == 0) {
										$insert_modif_email = $bdd->prepare("UPDATE client SET email = ? WHERE Idclient = ?");
										$insert_modif_email->execute(array($modifemail2, $_SESSION['user']['Idclient']));
										$message = 'Votre email à bien été modifié, vous allez être redirigé dans quelques secondes, si vous ne voulez pas attendre
											<br/> cliquer <a href ="mon_compte.php?page=compte">ici</a> Pour retourner à l\'accueil';
											$_SESSION['user']['email'] = $modifemail2;

								} else { 
									$erreur = 'Email déjà existant !';
								}
								
							} else {
								$erreur = 'Erreur : Email identique au précedent !';
							}

						} else { 
							$erreur = 'Erreur : Votre email n\'est pas valide !';
						}

					} else { 
						$erreur = 'Erreur : Votre email est trop long !';
					}

				} else { 
					$erreur = 'Tout les champs du formulaire doivent être remplis !';
				}

			} else { 
				header('location:se_connecter.php');
			}
				

			if (isset($erreur)) {
				echo $erreur ;

			} else {
				echo $message;
				header("refresh:3;mon_compte.php?page=compte.php");
			}
			
		?>

	</div>

<?php include('include/footer.php'); ?>	