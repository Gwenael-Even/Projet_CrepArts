<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>

	<div class = "bloc_cible_formulaire">

		<?php

			if (isset($_POST['email_mdp']) AND !empty($_POST['email_mdp'])) {

				$email_mdp = htmlspecialchars($_POST['email_mdp']);

				if(filter_var($email_mdp, FILTER_VALIDATE_EMAIL)) {

				$req_email = $bdd->prepare("SELECT * FROM client where email = ?");
				$req_email->execute(array($email_mdp));
				$mail_exist = $req_email->rowcount();

					if ($mail_exist == 1) {

						$_SESSION['flash']['email_mdp'] = $email_mdp;
						header('location:mdp_oublier_part2.php');
						

					} else {
						$erreur = 'Cet email n\'existe pas désolé ! <br />
						Pas inscrit ? <a href = "inscription.php">S\'inscrire</a>';
					}

				} else {
					$erreur = 'Email Non valide !';
				}

			} else {
				$erreur = 'Vous n\'avez pas rentrer votre email !';
			}

			if (isset($erreur)) {
				$_SESSION['post'] = $_POST;
				$_SESSION['erreur'] = $erreur;
				header('location:mdp_oublier.php');
			}
		?>
	</div>

<?php include('include/footer.php'); ?>