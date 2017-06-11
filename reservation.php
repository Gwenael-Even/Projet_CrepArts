<?php include ('include/header.php'); ?>

<?php

	if (empty($_SESSION['user'])) {
		die(header('location:se_connecter.php?erreur=reservation'));
	}
	
?>

	<section class = "contenu">

		<div class = "bloc_formulaire_reservation">

			<div class = "bloc_texte_reservation">

				<h1>Réserver une table</h1>

				<p>
					Réservez dès à présent votre table au Restaurant CREP'ART !<br />
					Sachez que nous ne prenons pas les réservation plus d'un an à l'avance.
				</p>

			</div>

				<div class = "centrage_formulaire_reservation">

					<div class = "formulaire_reservation">

						<form method = "post" action = "cible_formulaire_reservation.Php">

							<label for = "contact_nom">Date</label>
							<input type = "date" name = "date" id = "date" style = "width: 135px" max = "2025-12-31" min = "2016-03-25" required
									value ="<?php if(isset($_SESSION['post']['date'])) { echo $_SESSION['post']['date'];}?>" />

							<label for = "contact_nom">Heure</label>
							<input type = "time" name = "heure" id = "heure" style = "width: 135px" max = "22:00" min = "12:00" required
									value ="<?php if(isset($_SESSION['post']['heure'])) { echo $_SESSION['post']['heure'];}?>" />

							<label for = "contact_nom">Nombre de personnes</label>
							<input type = "number" name = "nb_personnes" id = "nb_personnes" style = "width: 135px" min = "1" max = "12" maxlength="2" required 
									value ="<?php if(isset($_SESSION['post']['nb_personnes'])) { echo $_SESSION['post']['nb_personnes'];}?>" />

							<div class = "bouton_reservation">
								<input type = "submit" class = "bouton_css" value = "Reserver"/>
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

		</div>
			
	</section>

<?php include('include/footer.php'); ?>