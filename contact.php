<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>						

	<div class = "contenu">

		<div class = "bloc_formulaire_contact">

			<h2>Nous contacter</h2>

			<div class = "formulaire_contact">

				<form action = "Cible_formulaire_contact.php" method = "POST">

					<div class = "bloc_formulaire_contact_coord">

						<label for = "contact_nom"> Votre nom : </label>
						<input type = "text" name = "contact_nom" id = "contact_nom" placeholder = "Exemple : Jean " style = "width: 200px" required  
								value ="<?php if(!empty($_SESSION['user'])) { echo $_SESSION['user']['nom'];}?>" /> <br />

						<label for = "contact_prenom"> Votre prenom : </label>
						<input type = "text" name = "contact_prenom" id = "contact_prenom" placeholder = "Exemple : Dupont" style = "width: 200px" required 
								value ="<?php if(!empty($_SESSION['user'])) { echo $_SESSION['user']['prenom'];} elseif (isset($_SESSION['post']['contact_prenom'])) { echo $_SESSION['post']['contact_prenom']; }  ?>" /> <br />

						<label for = "contact_mail"> Votre email : </label>
						<input type = "email" name = "contact_email" id = "contact_email" placeholder = "Exemple : mon.email@email.fr" style = "width: 200px" required 
							   value ="<?php if(!empty($_SESSION['user'])){ echo $_SESSION['user']['email'];} elseif (isset($_SESSION['post']['contact_email'])) { echo $_SESSION['post']['contact_email'];} ?>" /> <br />

					</div>

					<div class = "bloc_formulaire_contact_message">

						<label for = "contact_message"> Votre Message : </label>
						<textarea name = "contact_message" id = "contact_message" placeholder = "Entrer votre message ici..." required><?php if(isset($_SESSION['post']['contact_message'])) { echo $_SESSION['post']['contact_message'];}?></textarea> <br />

					</div>

					<div class = "bouton_formulaire_contact">
						<input type = "submit" class = "bouton_css" value = "Envoyer">
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