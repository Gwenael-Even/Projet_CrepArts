<?php 
include('include/header.php');
include('include/bddconnect.php'); 
?>

	<div class = "bloc_cible_formulaire">
<?php
		if(!empty($_SESSION['user'])) { header('location:mon_compte.php'); }

			$req_mdp_oubli = $bdd->prepare("SELECT * FROM client Where email = ?");

			$req_mdp_oubli->execute(array($_SESSION['flash']['email_mdp']));

			$email_exist = $req_mdp_oubli->rowcount();



				if ($email_exist == 1) { 

				$info_client = $req_mdp_oubli->fetch();

				?>

					<h3>Veuillez renseigner votre réponse secrète pour reinitialiser votre mot de passe.</h3>

					<form method = "post" action = "Cible_formulaire_mdp_oublier_part2.php">

					<label for = "question_secrete">Votre question secrète :</label>
					<input type = "text" name = "question_secrete" id = "question_secrete" required readonly value = "<?= $info_client['question_secrete'];?>" /> <br />

					<label for = "reponse_secrete">Votre réponse secrète :</label>
					<input type = "text" name = "reponse_secrete" id = "reponse_secrete" required value = "<?php if (isset($_SESSION['post'])) { echo $_SESSION['post']; } ?>"> <br />

					<input type = "submit" class = "bouton_css" value = "Valider !"/>

					</form>

					<?php if(array_key_exists('erreur', $_SESSION)): ?>

					<div class = "bloc_alert_erreur">

						<div class = "texte_alert_erreur">

						<?= $_SESSION['erreur']; ?>

						</div>

					</div>

					<?php 

						 unset($_SESSION['erreur']);
						 unset($_SESSION['post']);
						 endif;
					?>

		<?php
				} else {
					header('location:accueil.php');
				}
		?>

















	</div>

<?php include('include/footer.php'); ?>