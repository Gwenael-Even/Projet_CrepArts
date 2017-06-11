<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>

    <div class = "contenu">

   		<div class = "bloc_progress_compte">

			<nav class = "progress_compte">

				<?php

					if(!empty($_GET['page']))
						${$_GET['page']} = 'courant';
					else
						$compte = 'courant';

				?>
				 
				<ul class = "liste_progress">

					<li class ="compte"><a href = "mon_compte.php?page=compte">Informations</a></li>
					<li class ="<?php echo $coordonnees; ?>"><a href = "compte_coordonnees.php?page=coordonnees">Coordonnées</a></li>
					<li class ="commande"><a href = "compte_commande.php?page=commande">Commande</a></li>
					<li class ="reservation"><a href = "compte_reservation.php?page=reservation">Réservation</a></li>
					<li class ="deconnexion"><a href = "compte_deconnexion.php?page=deconnexion">Deconnexion</a></li>

				</ul>

			</nav>

		</div>

		<div class = "bloc_formulaire_coordonnes">

			<h3>
				Vous avez entré de mauvaises coordonnées lors de l'inscription ? <br />
				Vous avez changé d'adresse ? <br /> <br />

				Merci de modifier vos informations personnelles ici afin de ne pas avoir d'erreurs 
				lors de la livraison de vos futures commandes.
			</h3>


			<div class = "bloc_titre_coordonnes">

				<h3>Vos coordonnées:</h3>

			</div>

			<div class = "modif_coordonnes">

			<form method = "post" action = "Cible_formulaire_modif_coordonnes.php">

				<div class = "nom">
					<label for = "new_nom">Votre nom: </label>
					<input type = "text" name = "new_nom" id = "new_nom" maxlength = "20"  placeholder = "Nom" value = '<?= $_SESSION['user']['nom']; ?>' required style = "width: 200px"
							value =<?php if(isset($_SESSION['post']['new_nom'])) { echo $_SESSION['post']['new_nom'];}?> >
				</div>

				<div class = "prenom">
					<label for = "new_prenom">Votre prénom :</label>
					<input type = "text" name= "new_prenom" id = "new_prenom" maxlength = "20"  placeholder = "Prénom" value = '<?= $_SESSION['user']['prenom']; ?>' required style = "width: 200px"
							value =<?php if(isset($_SESSION['post']['new_prenom'])) { echo $_SESSION['post']['new_prenom'];}?> >
				</div>

				<div class = "date_naissance">
					<label for = "new_date_naissance">Votre date de naissance :</label>
					<input type = "date" name= "new_date_naissance" id = "new_date_naissance" max="2005-12-31" min="1920-01-01" value= '<?= $_SESSION['user']['date_naissance'] ?>' required  placeholder = "Date naissance" style = "width: 200px"
							value =<?php if(isset($_SESSION['post']['new_date_naissance'])) { echo $_SESSION['post']['new_date_naissance'];}?> >
				</div>

				<div class = "adresse">
					<label for = "new_adresse">Votre adresse :</label>
					<input type = "text" name = "new_adresse" id = "new_adresse" maxlength = "30"  placeholder = "Adresse" value = '<?= $_SESSION['user']['adresse'] ?>' required style = "width: 200px"
							value =<?php if(isset($_SESSION['post']['new_adresse'])) { echo $_SESSION['post']['new_adresse'];}?> >
				</div>

				<div class = "ville">
					<label for = "new_ville">Votre ville :</label>
					<input type = "text" name ="new_ville" id = "new_ville" maxlength = "20"  placeholder = "Ville" value = '<?= $_SESSION['user']['ville'] ?>' required style = "width: 200px"
							value =<?php if(isset($_SESSION['post']['new_ville'])) { echo $_SESSION['post']['new_ville'];}?> >
				</div>

				<div class = "code_postal">
					<label for = "new_code_postal">Votre code postal :</label>
					<input type = "text" name ="new_code_postal" id = "new_code_postal"  maxlength = "5" placeholder = "Code Postal" value = '<?= $_SESSION['user']['code_postal'] ?>' required style = "width: 200px"
							value =<?php if(isset($_SESSION['post']['new_code_postal'])) { echo $_SESSION['post']['new_code_postal'];}?> >
				</div>

				<div class = "numtel">
					<label for = "new_numtel">Votre numéro de téléphone :</label>
					<input type = "texte" name ="new_numtel" id = "new_numtel" size = "10"  placeholder = "Téléphone" value = '<?= $_SESSION['user']['numtel'] ?>' required  style = "width: 200px"
							value =<?php if(isset($_SESSION['post']['new_numtel'])) { echo $_SESSION['post']['new_numtel'];}?> >
				</div>
						
				<div class = "bouton_modif_coordonnes">	
					<input type = "submit" name = "modif_coordonnes" class = "bouton_css" value = "Modifier !"/>	
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

<?php include('include/footer.php'); ?>