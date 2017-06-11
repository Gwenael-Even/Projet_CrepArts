<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>

	<section class = "contenu">

		<div class = "bloc_panier_livraison">

			<div class = "bloc_progress">

				<nav class = "progress_panier">

					<?php

						if(!empty($_GET['page']))
							${$_GET['page']} = 'courant';
						else
							$panier = 'courant';

					?>
	 
					<ul class = "liste_progress">

						<li class ="panier">Panier</a></li>
						<li class ="<?php echo $livraison; ?>">Livraison</a></li>
						<li class ="paiement">Paiement</a></li>
						<li class ="confirmation">Confirmation</a></li>

					</ul>

				</nav>

				<div class = "bouton_retour_progress">

					<a href = "panier.php?page=panier" title = "Appuyer pour vous rendre à l'étape de la commande antérieur">sssssssss<br />sssssssss<br />sssssssss</a>

				</div>

			</div>

			<div class = "bloc_panier_livraison_choix">

				<div class = "bloc_panier_livraison_actu">

					<span class = "adresse_actu_adresse"><?= $_SESSION['user']['adresse'] ?></span>
					<span class = "adresse_actu_code_postal"><?= $_SESSION['user']['code_postal'] ?></span>
					<span class = "adresse_actu_ville"><?= $_SESSION['user']['ville'] ?></span>
					<span class = "adresse_actu_numtel"><?= $_SESSION['user']['numtel'] ?></span>

					<div class = "bouton_panier_livraison_continuer">
						<a href = "panier_paiement.php?page=paiement">Continuer ma commande</a>
					</div>

				</div>

				<div class = "bloc_panier_livraison_autre">

					<form method = "post" action = "Cible_formulaire_modif_adresse.php">

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
						
						<div class = "bouton_modif_adresse">	
							<input type = "submit" name = "modif_coordonnes" class = "bouton_css_panier_livraison" value = "Modifier et continuer"/>	
						</div>

					</form>

					<?php if(array_key_exists('erreur', $_SESSION)): ?>

					<div class = "alert erreur">

						<?= $_SESSION['erreur']; ?>


					</div>

					<?php 

						 unset($_SESSION['erreur']);
						 unset($_SESSION['post']);
						 endif;
					?>


				</div>

			</div>
						
		</div>

	</section>

<?php include('include/footer.php'); ?>