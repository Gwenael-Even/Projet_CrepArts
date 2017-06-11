<?php include ('include/header.php'); ?>

<?php

	if(!empty($_SESSION['user'])) {
		header('location:mon_compte.php');
	}

?>

	<div class = "contenu">

		<div class = "bloc_formulaire_inscription">

			<h2>Avant de profiter de nos services de livraison à domicile ou de réservation, veuillez vous inscrire à notre site.</h2>

			<form method = "post" action = "Cible_formulaire_inscription.php">

				<div class = "formulaire_inscription">

					<h3>Vos identifiants:</h3>

					<div class = "email">
						<input type = "email" class = "input_login" name = "email" id = "email" maxlength = "50" required placeholder = "E-mail" style = "width: 182px"
								value ="<?php if(isset($_SESSION['post']['email'])) { echo $_SESSION['post']['email']; } ?>" />
					</div>

					<div class = "mdp">
						<input type = "password" class = "input_pass" name = "pass" id = "pass" maxlength = "15" required placeholder = "Mot de passe" style = "width: 182px" />
					</div>

					<div class = "mdp2">
						<input type = "password" class = "input_pass" name = "pass2" id ="pass2" maxlength = "15" required placeholder = "Confirmer votre mot de passe" style = "width: 182px"3>
					</div>

					<h3>Vos coordonnées:</h3>

					<div class = "nom">
						<input type = "text" name = "nom" id = "nom" maxlength = "20" required placeholder = "Nom" style = "width: 200px" 
								value ="<?php if(isset($_SESSION['post']['nom'])) { echo $_SESSION['post']['nom'];}?>" />
					</div>

					<div class = "prenom">
						<input type = "text" name= "prenom" id = "prenom" maxlength = "20" required placeholder = "Prénom" style = "width: 200px" 
								value ="<?php if(isset($_SESSION['post']['email'])) { echo $_SESSION['post']['prenom'];}?>" />
					</div>

					<div class = "date_naissance">
						<input type = "date" name= "date_naissance" id = "date_naissance" max = "2015-12-31" min = "1920-01-01" required placeholder = "Date naissance" style = "width: 200px" 
								value ="<?php if(isset($_SESSION['post']['email'])) { echo $_SESSION['post']['date_naissance'];}?>" />
					</div>

					<div class = "adresse">
						<input type = "text" name = "adresse" id = "adresse" maxlength = "30" required placeholder = "Adresse" style = "width: 200px"
								 value ="<?php if(isset($_SESSION['post']['email'])) { echo $_SESSION['post']['adresse'];}?>" />
					</div>

					<div class = "ville">
						<input type = "text" name ="ville" id = "ville" maxlength = "20" required placeholder = "Ville" style = "width: 200px" 
								value ="<?php if(isset($_SESSION['post']['email'])) { echo $_SESSION['post']['ville'];}?>" />
					</div>

					<div class = "code_postal">
						<input type = "text" name ="code_postal" id = "code_postal" required maxlength = "5" placeholder = "Code Postal" style = "width: 200px" maxlength = "5"
								value = "<?php if(isset($_SESSION['post']['email'])) { echo $_SESSION['post']['code_postal'];}?>" />
					</div>

					<div class = "numtel">
						<input type = "texte" name ="numtel" id = "numtel" required placeholder = "Téléphone" style = "width: 200px" maxlength = "10"
								value ="<?php if(isset($_SESSION['post']['email'])) { echo $_SESSION['post']['numtel'];}?>" />
					</div>

					<h3>
						Permet la réinitialisation du mot de passe,<br />
						si celui-ci est perdu.
					</h3>

					<div class = "question_secrete">
						<input type = "texte" name = "question_secrete" id = "question_secrete" required placeholder = "Votre question secrète" style = "width: 200px" 
						value ="<?php if(isset($_SESSION['post']['question_secrete'])) { echo $_SESSION['post']['question_secrete'];}?>" />
					</div>

					<div class = "reponse_secrete">
						<input type = "texte" name = "reponse_secrete" id = "reponse_secrete" required placeholder = "Votre réponse secrète" style = "width: 200px" 
						value ="<?php if(isset($_SESSION['post']['reponse_secrete'])) { echo $_SESSION['post']['reponse_secrete'];}?>" />

					</div>

					<div class = "bouton_inscription">	
						<input type = "submit" class = "bouton_css" value = "S'inscrire"/>	
					</div>

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

			</form>

			<div class = "inscription_vers_connection">

				<p>Vous êtes déjà inscrit ? <a href = "se_connecter.php">Se connecter</a></p>

			</div>

		</div>

	</div>

<?php include('include/footer.php'); ?>
