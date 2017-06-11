<?php include ('include/header.php'); ?>

	<div class = "contenu">

		<nav class = "progress_compte">

			<?php

					if(!empty($_GET['page']))
						${$_GET['page']} = 'courant';
					else
						$compte = 'courant';

			?>
				 
			<ul class = "liste_progress">

				<li class = "<?php echo $compte; ?>"><a href = "mon_compte.php?page=compte">Informations personelle</a></li>
				<li class = "coordonnees"><a href = "compte_coordonnees.php?page=coordonnees">Coordonnées</a></li>
				<li class = "commande"><a href = "compte_commande.php?page=commande">Commande</a></li>
				<li class = "reservation"><a href = "compte_reservation.php?page=reservation">Réservation</a></li>
				<li class = "deconnexion"><a href = "compte_deconnexion.php?page=deconnexion">Deconnexion</a></li>

			</ul>

		</nav>

		<div class = "formulaire_mon_compte">

			<?php if (empty($_SESSION['user'])) { die(header('location:se_connecter.php')); } ?>

			<p>
				Bonjour <?php echo $_SESSION['user']['prenom'].' '.$_SESSION['user']['nom'] ?>,	bienvenue sur votre gestion de compte, <br />
				vous pouvez modifier vos informations personnelles ou <br />
			    accéder à vos réservations et vos commandes en ligne.
			</p>
								  
			<h3>Changer votre email</h3>

			<form method = "post" action = "Cible_formulaire_modif_email.php">

				<div class = "modifemail">

					<label for = "modifemail">Email actuel :</label>
					<input class = "input_modifemail" type = "email" name = "modifemail" id = "modifemail" required value =<?php echo $_SESSION['user']['email']; ?> readonly placeholder = "Email actuel" style = "width: 200px" />

					<label for = "modifemail2">Nouvel Email :</label>
					<input class = "input_modifemail2" type = "email" name = "modifemail2" id = "modifemail2" required placeholder = "Nouvel email" style = "width: 200px"
							value ="<?php if(isset($_SESSION['post']['modifemail2'])) { echo $_SESSION['post']['modifemail2'];}?>" />
								
				</div>

				<div class = "bouton_modifier">

					<input type = "submit" class = "bouton_css" name = "change_email" value = "Modifier !"/>

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


			<h3> Changer votre mot de passe </h3>

		    <form method = "post" action = "Cible_formulaire_modif_mdp.php">

			    <div class = "modifmdp">

					<label for = "ancienmdp">Votre ancien mot de passe :</label>
					<input class = "ancienmdp" type = "password" name = "ancienmdp" id = "ancienmdp" required placeholder = "Ancien mot de passe" style = "witdh: 200px"/>

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

	</div>
	
<?php include('include/footer.php'); ?>