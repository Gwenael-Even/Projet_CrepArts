<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>

	<section class = "contenu">

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
					<li class ="<?php echo $reservation; ?>"><a href = "compte_reservation.php?page=reservation">Réservation</a></li>
					<li class ="deconnexion"><a href = "compte_deconnexion.php?page=deconnexion">Deconnexion</a></li>

				</ul>

			</nav>

		</div>

		<div class = "bloc_texte_panier">
			
			<h2>Vos reservation</h2>

			 	<?php
			 		$histo_req = $bdd->prepare("SELECT * FROM reservation WHERE Idclient = ?"); //Requete pour trouver les reservations en fonction d'un client.
					$histo_req->execute(array($_SESSION['user']['Idclient'])); 
					$histo_count = $histo_req->rowcount(); 
						if ($histo_count >= 1) { 
				?>

			<div id = "tableau_panier">
						
				<table >

					<thead>

						<tr>

							<th class = "image_produit">N° Réservation</th>
							<th class = "article">Date de la réservation</th>
							<th class = "prix_unitaire">Heure de la réservation</th>
							<th class = "quantite">Nombre de personne attendu </th>										

						</tr>
			
					</thead>

					<?php foreach($histo_req as $histo_reserv): ?>

					<div id = "tableau_panier">
							
						<tbody>

							<tr>				

								<th class = "article">
									<?= 'Réservation N° : '.$histo_reserv['idreservation']; ?>
								</th>

								<th class = "prix_unitaire">
									<?= $histo_reserv['date_reservation']; ?>
								</th>

								<th class = "quantite">
									<?= $histo_reserv['heure_reservation']. 'h'; ?>
								</th>

								<th class = "prix_total">
									<?= $histo_reserv['nb_place_reserve']. ' Personne(s)' ;
									
									?>

								</th>

							</tr>

							<?php endforeach; ?>

						</tbody>

					</div>								

				</table>

			</div>

		</div>

		<?php } else { ?>

			<section class = "contenu">

				<div class = "bloc_compte_vide">

					<p> Vous n'avez pas encore de réservation en ligne ! <br />
					<a href ="reservation.php">Réserver maintenant !</a> </p>

				</div>

			</section>

		<?php } 	
	 	
			$histo_req->closeCursor(); //Fermeture de la requete.

		?>
	 	
	</section>

<?php 
include('include/footer.php'); 
?>	