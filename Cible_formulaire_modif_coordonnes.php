<?php include('include/header.php');
	  include('include/bddconnect.php') ?>

	<div class = "bloc_cible_formulaire">

		<?php

			if(empty($_SESSION['user'])) { header('location:se_connecter.php'); }

				if(isset($_POST['new_nom'],$_POST['new_prenom'],$_POST['new_date_naissance'],$_POST['new_adresse'],$_POST['new_ville'],$_POST['new_code_postal'],$_POST['new_numtel'])) {
					if (!empty($_POST['new_nom']) AND !empty($_POST['new_prenom']) AND !empty($_POST['new_date_naissance']) AND !empty($_POST['new_adresse']) AND !empty($_POST['new_ville']) AND 
						!empty($_POST['new_code_postal']) AND !empty($_POST['new_numtel'])) {
							$new_nom = htmlspecialchars($_POST['new_nom']);
							$new_prenom = htmlspecialchars($_POST['new_prenom']);
							$new_date_naissance = htmlspecialchars($_POST['new_date_naissance']);
							$new_adresse = htmlspecialchars($_POST['new_adresse']);
							$new_ville = htmlspecialchars($_POST['new_ville']);
							$new_code_postal = htmlspecialchars($_POST['new_code_postal']);
							$new_numtel = htmlspecialchars($_POST['new_numtel']);

						if(ctype_digit($new_numtel)) {

							if(ctype_digit($new_code_postal)) {

									$insert_compte_coordonnees = $bdd->prepare("UPDATE client SET nom = ?, prenom = ?, date_naissance = ?, adresse = ?, ville = ?, code_postal = ?, numtel = ? WHERE Idclient = ?");
												$insert_compte_coordonnees->execute(array($new_nom, $new_prenom, $new_date_naissance, $new_adresse, $new_ville, $new_code_postal, $new_numtel, $_SESSION['user']['Idclient']));
												$message = 'Vos coordonnés ont bien été modifiés, vous allez être redirigé dans quelques secondes, si vous ne voulez pas attendre
													<br /> cliquer <a href = "compte_coordonnees.php?page=coordonnees">ici</a> Pour retourner à l\'accueil';
													$_SESSION['user']['nom'] = $new_nom;
													$_SESSION['user']['prenom'] = $new_prenom;
													$_SESSION['user']['date_naissance'] = $new_date_naissance;
													$_SESSION['user']['adresse'] = $new_adresse;
													$_SESSION['user']['ville'] = $new_ville;
													$_SESSION['user']['code_postal'] = $new_code_postal;
													$_SESSION['user']['numtel'] = $new_numtel;

							} else {
								$erreur = 'Erreur : Votre code postal ne semble pas valide ! <br />';
							}

						} else {
							$erreur = 'Erreur : Votre numéro de télephone ne semble pas valide ! <br />';
						}

					} else {
						$erreur = 'Tout les champs du formulaire doivent être remplis !';
					}

				} else {
					$erreur = 'Tout les champs du formulaire doivent être remplis !';
				}
			

			if(isset($erreur)) {
				$_SESSION['erreur'] = $erreur;
				$_SESSION['post'] = $_POST;
				
			} else {
				echo $message;
				header('refresh:3;mon_compte.php');
			}
		?>

	</div>

<?php include('include/footer.php'); ?>