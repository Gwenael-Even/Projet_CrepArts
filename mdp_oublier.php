<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>

	<div class = "contenu">

		<?php if (!empty($_SESSION['user'])) { header('location:se_connecter.php'); } ?>

		<div class = "bloc_cible_formulaire">

			<h3>Veuillez renseigner votre adresse e-mail pour reinitialiser votre mot de passe.</h3>

			<div class = "connection">

				<form method = "post" action = "cible_formulaire_mdp_oublier.php">

					<div class = "login">
						<input type = "text" class = "input_login" name = "email_mdp" id = "email_mdp" required placeholder = "E-mail" maxlength = "50" style = "width: 182px"
								value = <?php if (isset($_SESSION['post']['email_mdp'])) { echo $_SESSION['post']['email_mdp']; } ?> >
					</div>

					<div class = "bouton_modifier">	
						<input type = "submit" class = "bouton_css" value = "Envoyer"/>	
					</div>

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
			</div>

		</div>

	</div>

<?php include('include/footer.php'); ?>