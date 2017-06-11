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
					<li class ="<?php echo $commande; ?>"><a href = "compte_commande.php?page=commande">Commande</a></li>
					<li class ="reservation"><a href = "compte_reservation.php?page=reservation">Réservation</a></li>
					<li class ="deconnexion"><a href = "compte_deconnexion.php?page=deconnexion">Deconnexion</a></li>

				</ul>

			</nav>

		</div>

		<div class = "bloc_texte_panier">
			
			<h3>Vos Commandes</h3>

			 	<?php

			 		$histo_req = $bdd->prepare("SELECT * FROM commande_domicile, ligne_commande WHERE commande_domicile.Idclient = ? "); //Requete pour trouver les reservations en fonction d'un client.
					$histo_req->execute(array($_SESSION['user']['Idclient'])); 
					$histo_count = $histo_req->rowcount(); 
						 if ($histo_count >= 1) { 

				?>

			<div id = "tableau_panier">
						
				<table >

					<thead>

						<tr>
						<th class = "date">Date de la réservation</th>
							<th class = "image_produit">Aperçu</th>
							<th class = "article">Article</th>
							<th class = "quantite">Quantité</th>
							<th class = "prix_total">Prix total TTC</th>									

						</tr>
			
					</thead>

					<?php foreach($histo_req as $histo_commande): ?>

					<div id = "tableau_panier">
							
						<tbody>

							<tr>

								<th class = "date">
									<?= 'Commande du : '.$histo_commande['date_commande']; ?>
								</th>

								<th class = "imag_produit">
									<?= 'Commande N° : '.$histo_commande['idcommande']; ?>
								</th>

								<th class = "article">
									<?= $histo_commande['produit_command'].'<br />'; ?>
								</th>

								<th class = "quantité">
									<?=   $histo_commande['quantite']; ?>
								</th>	

								<th class = "prix_total">
									<?= $histo_commande['facture'].' €'; ?>
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

					<p>
						Vous n'avez pas fait de commande en ligne !<br />
						<a href ="la_carte.php">Acceder à notre carte de produit !</a>
					</p>

				</div>

			</section>

		<?php } 	
	 	
			$histo_req->closeCursor(); //Fermeture de la requete.

		?>
	 	
	</section>

<?php include('include/footer.php'); ?>