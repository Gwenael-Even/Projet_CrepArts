<?php 
include('include/header.php');
include('include/bddconnect.php'); 
?>

	<div class = "bloc_cible_formulaire">

		<?php

			if(isset($_POST['contact_nom']) AND isset($_POST['contact_prenom']) AND isset($_POST['contact_email']) AND isset($_POST['contact_message'])
			 AND !empty($_POST['contact_nom']) AND !empty($_POST['contact_prenom']) 
			 AND !empty($_POST['contact_email']) AND !empty($_POST['contact_message'])) {

			 	$contact_nom = htmlspecialchars($_POST['contact_nom']);
			 	$contact_prenom = htmlspecialchars($_POST['contact_prenom']);
			 	$contact_email = htmlspecialchars($_POST['contact_email']);
			 	$contact_message = htmlspecialchars($_POST['contact_message']);
			 	$taille_email = strlen($contact_email);

				$header="MIME-Version: 1.0\r\n";
				$header.='From:"Creparts.com'."\n";
				$header.='Content-Type:text/html; charset="uft-8"'."\n";
				$header.='Content-Transfer-Encoding: 8bit';

			 	if ($taille_email <= 50) {

			 		if (filter_var($contact_email, FILTER_VALIDATE_EMAIL)) { //Verification de la validité de l'email
			 						//Un peu d'html pour présenter le mail plus proprement.
			 			$message= '
									<html>

										<body> 

											<div align="center"><br />
												
												<u>Nom de l\'expéditeur :</u>'.$contact_nom. ' ' .$contact_prenom.'<br />
												<u>Mail de l\'expéditeur :</u>'.$_POST['contact_email'].'<br />
												<br />
												'.nl2br($contact_message).'
												<br />

											</div>

										</body>

									</html>
									';

										mail($contact_email, "CONTACT - Creparts.fr", $message, $header);

						$message_confirmation = 'Votre message à bien été envoyé à projet.creparts@gmail.com, nous vous remercions de nous avoir contacté, vous allez être redirigé à l\'accueil, <br />
												Si vous ne souhaitez pas attendre, <a href ="accueil.php">cliquer ici</a>';
											
			 		} else {
			 			$erreur = 'Erreur : Email non valide, <br />
			 						veuillez réessayer en cliquant <a href ="contact.php">ici</a>';
			 		}

			 	} else {
			 		$erreur = 'Erreur : Votre email est trop longue ! <br />
								veuillez réessayer en cliquant <a href ="contact.php">ici</a>';
			 	}

			} else {
				$erreur = 'Erreur : Veuillez remplir tout les champs du formulaire ! <br />
							veuillez réessayer en cliquant <a href ="contact.php">ici</a>';
			}

			if (isset($erreur)) {
				$_SESSION['erreur'] = $erreur;
				$_SESSION['post'] = $_POST;
				header('location:contact.php');

			} else {

				echo $message_confirmation;
				header('refresh:3;accueil.php');
			}
		?>

	</div>

<?php include('include/footer.php'); ?>