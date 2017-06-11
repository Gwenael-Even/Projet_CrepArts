<?php
include('include/header.php');
include('include/bddconnect.php');
?>
	<div class = "bloc_cible_formulaire">

			<h3> Changer votre mot de passe </h3>

		    <form method = "post" action = "Cible_formulaire_mdp_oublier_part3.php">

			    <div class = "modifmdp">

				    <label for = "newmdp1">Votre nouveau mot de passe :</label>
					<input class = "newmdp1" type = "password" name = "newmdp1" id = "newmdp1" required placeholder = "Nouveau mot de passe" style = "witdh: 200px"/>

					<label for = "newmdp2">Confirmer votre mot de passe :</label>
					<input class = "newmdp2" type = "password" name = "newmdp2" id = "newmdp2" required placeholder = "Confirmer votre mot de passe" style = "witdh: 200px"/>
								
				</div>

				<div class = "bouton_modifier">

					<input type = "submit" class = "bouton_css" name = "change_mdp" value = "Modifier !"/>

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

<?php
include('include/footer.php');
?>