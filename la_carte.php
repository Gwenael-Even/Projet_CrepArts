<?php 
include ('include/header.php'); 
include('include/bddconnect.php'); 
?>

	<div id = "contenu_carte">

		<div class = "carte">

			<nav class = "menu_carte">
							 
				<ul class = "liste_carte">

					<li><a href = "la_carte.php#galette">Galette</a></li>
					<li><a href = "la_carte.php#crepes">Crêpes</a></li>
					<li><a href = "la_carte.php#avec_alcool">Boisson avec alcool</a></li>
					<li><a href = "la_carte.php#sans_alcool">Boisson sans alcool</a></li>

				</ul>

			</nav>

			<div class = "galettes">

				<div class = "bloc_titre">

					<h1 id = "galettes">Les galettes</h1>

				</div>

				<?php

					$type = 'galette%';	
					$req_produit = $bdd->query("SELECT * FROM produit WHERE type LIKE '$type'");

					foreach($req_produit as $produit):

				?>

					<div class = "bloc_produit">

						<div class = "bloc_ajouter_panier">

							<a href = "ajouter_panier.php?id=<?= $produit['idprod']; ?>"><img height = 42 width = 42 src = "images/ajouter_panier.png" alt = "Image ajouter au panier" title = "Cliquer pour ajouter le produit au panier."></a>

						</div>
						
						<div class = "produit_texte">

							<div class = "photo_produit">
								<img src = <?= "images/".$produit['images']. '.png'; ?> alt = "La galette, Saint Jacques">
							</div>

							<div class = "nom_produit">
								<?= $produit['libelle']; ?>
							</div>

							<div class = "compo_produit">
								<?= $produit['description']; ?>
							</div>

							<div class = "prix_produit">
								<?= number_format($produit['prix'], 2, ',', ' '). '€'; ?>
							</div>

						</div>

					</div>

				<?php endforeach; ?>

			</div>

			<div class = "crepes">

				<div class = "bloc_titre">

					<h1 id = "crepes">Les crêpes</h1>

				</div>

				<?php

					$type = 'crepe%';	
					$req_produit = $bdd->query("SELECT * FROM produit WHERE type LIKE '$type'");

					foreach($req_produit as $produit):

				?>

					<div class = "bloc_produit">

						<div class = "bloc_ajouter_panier">
							<a href = "ajouter_panier.php?id=<?= $produit['idprod']; ?>"><img height = 42 width = 42 src = "images/ajouter_panier.png" alt = "Image ajouter au panier" title = "Cliquer pour ajouter le produit au panier."></a>
						</div>

						<div class = "produit_texte">

							<div class = "photo_produit">
								<img src = <?= "images/".$produit['images'].".png" ?> alt = "La crêpe, Normande">
							</div>
							<div class = "nom_produit">
								<?= $produit['libelle']; ?>
							</div>
							<div class = "compo_produit">
								<?= $produit['description']; ?>
							</div>
							<div class = "prix_produit">
								<?= $produit['prix']. '€'; ?>
							</div>

						</div>

					</div>

				<?php endforeach; ?>

			</div>

			<div class = "boissons">

				<div class = "bloc_titre">

					<h1>Les boissons</h1>

				</div>

				<div class = "bloc_titre_boissons">

					<h2 id = "avec_alcool">Avec alcool</h2>

				</div>

				<?php 

					$type = 'boisson_alcool%';	
					$req_produit = $bdd->query("SELECT * FROM produit WHERE type LIKE '$type'");

					foreach($req_produit as $produit):

				?>

					<div class = "bloc_produit">

						<div class = "bloc_ajouter_panier">
							<a href = "ajouter_panier.php?id=<?= $produit['idprod']; ?>"><img height = 42 width = 42 src = "images/ajouter_panier.png" alt = "Image ajouter au panier" title = "Cliquer pour ajouter le produit au panier."></a>
						</div>

						<div class = "produit_texte">

							<div class = "photo_produit">
								<img src = <?= "images/".$produit['images'].".png" ?> alt = "Le cidre fermier">
							</div>
							<div class = "nom_produit">
								<?= $produit['libelle']; ?>
							</div>

							<div class = "compo_produit">
								<?= $produit['description']; ?>
							</div>

							<div class = "prix_produit">
								<?= $produit['prix']. '€'; ?>
							</div>

						</div>

					</div>

				<?php endforeach; ?>

					<div class = "bloc_titre_boissons">

						<h2 id = "sans_alcool">Sans alcool</h2>

					</div>

					<?php

						$type = 'boisson_sans_alcool%';	
						$req_produit = $bdd->query("SELECT * FROM produit WHERE type LIKE '$type'");

						foreach($req_produit as $produit):

					?>

						<div class = "bloc_produit">

							<div class = "bloc_ajouter_panier">
								<a href = "ajouter_panier.php?id=<?= $produit['idprod']; ?>"><img height = 42 width = 42 src = "images/ajouter_panier.png" alt = "Image ajouter au panier" title = "Cliquer pour ajouter le produit au panier."></a>
							</div>

							<div class = "produit_texte">

								<div class = "photo_produit">
									<img src = <?= "images/".$produit['images'].".png" ?> alt = "Eau">
								</div>
								<div class = "nom_produit">
									<?= $produit['libelle']; ?>
								</div>
								<div class = "compo_produit">
									<?= $produit['description']; ?>
								</div>
								<div class = "prix_produit">
									<?= $produit['prix']. ' €'; ?>
								</div>

							</div>

						</div>	

					<?php endforeach; ?>

			</div>	

			<div class = "bouton_retour_haut">

				<a href = "la_carte.php#contenu_carte" title = "Appuyer pour vous rendre en haut de la page">sssssssss<br />sssssssss<br />sssssssss</a>

			</div>

			<div class = "asterisque_boisson">

				<p><span>*</span> : D'autre volumes sont disponible 50cl, la bolée(18cl) mais uniquement en salle</p>

			</div>

		</div>

	</div>								

<?php include('include/footer.php'); ?>