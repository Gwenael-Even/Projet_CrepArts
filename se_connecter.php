<?php include ('include/header.php'); ?>

<?php 

	if(!empty($_SESSION['user'])) {
		header('location:mon_compte.php');
	}

?>	
	<div class = "contenu">

		<div class = "formulaire_connection">

			<h2>Se connecter à CREP'ART</h2>

			<div class = "connection">
				
				<form method = "post" action = "Cible_formulaire_connexion.php">

					<div class = "login">
						<input type = "text" class = "input_login" name = "emailconnect" id = "emailconnect" required placeholder = "E-mail" maxlength = "35" style = "width: 182px"
								value ="<?php if(isset($_SESSION['post']['emailconnect'])) { echo $_SESSION['post']['emailconnect'];}?>" />
					</div>

					<div class = "mdp">
						<input type = "password" class = "input_pass" name = "passconnect" id = "passconnect" required placeholder = "Mot de passe" maxlength = "15" style = "width: 182px"/>
					</div>

					<div class = "souvenir">
						<input type = "checkbox"  name = "se_souvenir" id ="se_souvenir" checked = "checked">
						<label for="se_souvenir">Se souvenir de moi</label>
					</div>

					<div class = "bouton_connection">
						<input type = "submit" class = "bouton_css" value = "Connexion"/>
					</div>

				</form>

			</div>

			<div class = "connexion_vers_inscription">

				<p>Vous n'avez pas de compte ? <a href = "inscription.php">S'inscrire</a></p>
				<p><a href="mdp_oublier.php">Mot de passe oublié ?</a></p>

				<?php

					if(array_key_exists('erreur', $_SESSION)): ?>

					<div class = "bloc_alert_erreur">

						<div class = "texte_alert_erreur">

							<?= $_SESSION['erreur'] ;
							unset($_SESSION['erreur']);
							unset($_SESSION['post']);
					?>

						</div>

					</div>

				<?php endif; ?>
				
				<?php

					if(isset($_GET['erreur'])): ?>

						<div class = "bloc_alert_erreur">

							<div class = "texte_alert_erreur">

								<?php 

									switch($_GET['erreur']) {	

										case 'panier':
										echo 'Vous devez être connecté pour accéder à notre service de commande en ligne !';
										break;

										case 'reservation':
										echo 'Vous devez être connecté pour accéder à notre service de réservation en ligne !';
										break;

										default;

									} 

								?>

							</div>

						</div>

					<?php endif; ?>

			</div>

			<div id = "cookie_alert">

				<script>
			
					function showhide() {
					 
						var div = document.getElementById("cookie-alert");

						if (div.style.display !== "none") {
					   		div.style.display = "none";

						} else {

					    	div.style.display = "block";

						}

					}

				</script>

				<div id = "cookie-alert">

					<span>
						En cliquant sur "Se souvenir de moi", vous acceptez l'utilisation de cookies, ceux-ci seront 
						utilisé uniquement dans le but de prolonger votre connexion sur notre site pendant 1 mois maximum,
						au dela, ils seront supprimés.
					</span>

					<button id = "button" onclick ="showhide()">J'ai compris</button>

				</div>

			</div>

		</div>

	</div>

<?php include('include/footer.php'); ?> <!-- Permet d'acceder à toute la partie "Footer" grâce au fichier Footer.php -->