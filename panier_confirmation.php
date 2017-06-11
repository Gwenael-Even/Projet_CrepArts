<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>

	<section class = "contenu">

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
					<li class ="livraison">Livraison</a></li>
					<li class ="paiement">Paiement</a></li>
					<li class ="<?php echo $confirmation; ?>">Confirmation</a></li>

				</ul>

			</nav>

			<div class = "bouton_retour_progress">

				<a href = "panier_paiement.php?page=paiement" title = "Appuyer pour vous rendre à l'étape de la commande antérieur">sssssssss<br />sssssssss<br />sssssssss</a>

			</div>

		</div>

		<div class = "bloc_panier_confirmation_adresse">

			<h2>Information pour l'adresse de livraison</h2>

			<div class = "bloc_panier_confirmation_adresse_texte">

				<span class = "confirmation_span">Adresse: </span>
				<span><?php echo $_SESSION['user']['adresse'] ?></span><br />

				<span class = "confirmation_span">Code postal: </span>
				<span><?php echo $_SESSION['user']['code_postal'] ?></span><br />

				<span class = "confirmation_span">Ville: </span>
				<span><?php echo $_SESSION['user']['ville'] ?></span><br />

				<span class = "confirmation_span">Téléphone: </span>
				<span><?php echo $_SESSION['user']['numtel'] ?></span><br />

			</div>

		</div>

		<?php

			$prix_total_tout=number_format($panier->total());
			$_SESSION['facture'] = $prix_total_tout;

		?>

		<div class = "bloc_panier_confirmation_commande">

			<h2>Récapitulatif commande</h2>

				<div id = "tableau_panier">

					<table >

						<thead>

							<tr>

								<th class = "image_produit">Aperçu</th>
								<th class = "article">Article</th>
								<th class = "prix_unitaire">Prix unitaire TTC</th>
								<th class = "quantite">Quantité</th>
								<th class = "prix_total">Prix total TTC</th>

							</tr>

						</thead>

						<?php 

							$id_liste=array_keys($_SESSION['panier']);

							if(empty($id_liste)) {

								$produits = array();

							} else {
							$produits = $bdd->query('SELECT * FROM produit WHERE idprod IN ('.implode(',' ,$id_liste).')');
							}

							foreach($produits as $produit):

						?>

						<div id = "tableau_panier">

							<tbody>

								<tr>

									<th class = "image_produit">
										<img src = <?= "images/".$produit['images']. '.png'; ?> alt = "La galette, Saint Jacques">
									</th>

									<th class = "article">
										<?= $produit['libelle']; ?>
									</th>

									<th class = "prix_unitaire">
										<?= number_format($produit['prix'], 2, ',', ' '). '€'; ?>
									</th>

									<th class = "quantite">
										<?= $_SESSION['panier'][$produit['idprod']]; ?>
									</th>

									<th class = "prix_total">
										
										<?= number_format($produit['prix']*$_SESSION['panier'][$produit['idprod']], 2, ',', ' '). '€'; ?>

									</th>

								</tr>

								<?php endforeach; ?>
							
							</tbody>

						</div>

					</table>

				</div>

				<div class = "prix_total_tout">

					<?php echo number_format($prix_total_tout, 2, ',', ' ').'€'; ?>
					
				</div>

			</div>

		</div>

		<div class = "bouton_panier_confirmation">
			<a href = "bdd_panier.php">Confirmer ma commande</a>
		</div>

	</section>

<?php include('include/footer.php'); ?>