<?php 
include('include/header.php');
include('include/bddconnect.php');
?>

<?php if(empty($_SESSION['user'])) { die(header('location:se_connecter.php?erreur=panier')); } ?>

	<section class = "contenu">

		<div class = "bloc_panier">

			<nav class = "progress_panier">

				<?php
					if(!empty($_GET['page']))
						${$_GET['page']} = 'courant';
					else
						$panier = 'courant';
				?>

				<ul class = "liste_progress">

					<li class = "<?php echo $panier;?>">Panier</a></li>
					<li class = "livraison">Livraison</a></li>
					<li class = "paiement">Paiement</a></li>
					<li class = "confirmation">Confirmation</a></li>

				</ul>

			</nav>

			<div class = "bloc_texte_panier">

				<h2>Mon panier</h2>

				<div id = "tableau_panier">

					<table >

						<thead>

							<tr>

								<th class = "image_produit">Aperçu</th>
								<th class = "article">Article</th>
								<th class = "prix_unitaire">Prix unitaire TTC</th>
								<th class = "panier_quantite_lien">Quantité</th>
								<th class = "prix_total">Prix total TTC</th>

							</tr>

						</thead>

						<?php 

							$id_liste=array_keys($_SESSION['panier']);

							if(empty($id_liste)) {

								$produits = array();

							} else {

							$produits = $bdd->query('SELECT * FROM produit WHERE idprod IN ('.implode(',' ,$id_liste).')'); //On récupère tout les id se trouvant dans le panier pour en récuperer les info.

							}

							foreach($produits as $produit):

						?>

						<div id = "tableau_panier">

							<tbody>

								<tr>

									<th class = "image_produit">
										<img src = <?= "images/".$produit['images']. '.png'; ?> alt = "Image du produit">
									</th>

									<th class = "article">
										<?= $produit['libelle']; ?>
									</th>

									<th class = "prix_unitaire">
										<?= number_format($produit['prix'], 2, ',', ' '). '€'; ?>
									</th>

									<th class = "panier_quantite">
										<a href = <?= "panier.php?id=".$produit['idprod'] ?>>hiddenhidden</a>
											<?php 
											if(isset($_GET['id'])) {
											unset($_SESSION['panier'][$produit['idprod']]);
											header('location:panier.php');
											}?>
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

			</div>

			<div class = "bouton_panier">

				<div class = "bouton_panier_poursuivre">
					<a href = "la_carte.php">Poursuivre mes achats</a>
				</div>

				<div class = "bouton_panier_continuer">
					<a href = "panier_livraison.php?page=livraison">Continuer ma commande</a>
				</div>

			</div>
							
		</div>

	</section>

	<?php
			if(empty($_SESSION['panier'])) {
				echo 'rien';
			}
	?>

<?php include('include/footer.php'); ?>