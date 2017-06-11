<?php include ('include/header.php'); 
	  include ('include/bddconnect.php'); ?>

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

					<li class ="compte"><a href = "mon_compte.php?page=compte">Informations personelle</a></li>
					<li class ="coordonnees"><a href = "compte_coordonnees.php?page=coordonnees">Coordonnées</a></li>
					<li class ="commande"><a href = "compte_commande.php?page=commande">Commande</a></li>
					<li class ="reservation"><a href = "compte_reservation.php?page=reservation">Réservation</a></li>
					<li class ="<?php echo $deconnexion; ?>"><a href = "compte_deconnexion.php?page=deconnexion">Deconnexion</a></li>

				</ul>

			</nav>

		</div>

		<div class = "bloc_compte_vide">

				<h3>Me déconnecter</h3>

				<p><a href = "deconnexion.php">Deconnexion</a></p>

		</div>

	</div>

<?php include('include/footer.php'); ?>