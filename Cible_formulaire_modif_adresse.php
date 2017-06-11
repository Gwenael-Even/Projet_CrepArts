<?php include('include/header.php');
	  include('include/bddconnect.php') ?>

	<div class = "bloc_cible_formulaire">

		<?php

			if($_SESSION) {

				if(isset($_POST['new_adresse'],$_POST['new_ville'],$_POST['new_code_postal'],$_POST['new_numtel'])) {
					if (!empty($_POST['new_adresse']) AND !empty($_POST['new_ville']) AND !empty($_POST['new_code_postal']) AND 
						!empty($_POST['new_numtel'])) {
							$new_adresse = htmlspecialchars($_POST['new_adresse']);
							$new_ville = htmlspecialchars($_POST['new_ville']);
							$new_code_postal = htmlspecialchars($_POST['new_code_postal']);
							$new_numtel = htmlspecialchars($_POST['new_numtel']);

						if(ctype_digit($new_numtel)) {

							if(ctype_digit($new_code_postal)) {


								$insert_compte_coordonnees = $bdd->prepare("UPDATE client SET adresse = ?, ville = ?, code_postal = ?, numtel = ? WHERE Idclient = ?");
											$insert_compte_coordonnees->execute(array($new_adresse, $new_ville, $new_code_postal, $new_numtel, $_SESSION['user']['Idclient']));
											$message = 'Vos coordonnés ont bien été modifiés, vous allez être redirigé dans quelques secondes, si vous ne voulez pas attendre
												<br/> cliquer <a href = "panier_paiement.php?page=paiement">ici</a> pour continuer la commande';
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
					$erreur = 'Tout les champs du formulaire doivent être remplis ! <br />
							 veuillez réessayer en cliquant <a href = "panier_livraison.php?page=livraison">ici</a>';
				}

				} else {
					$erreur = 'Tout les champs du formulaire doivent être remplis ! <br />
							 veuillez réessayer en cliquant <a href = "panier_livraison.php?page=livraison">ici</a>';
				}
			
			} else { header('location:se_connecter.php');
			
			}

			if(isset($erreur)) {
				$_SESSION['erreur'] = $erreur;
				$_SESSION['post'] = $_POST;
				header('location:panier_livraison.php?page=livraison');
			} else {
				echo $message;
				header('refresh:3;panier_paiement.php?page=paiement');
			}
		?>

	</div>

<?php include('include/footer.php'); ?>