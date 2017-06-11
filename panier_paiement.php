<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>

	<section class = "contenu">

		<div class = "bloc_panier_paiement">

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
						<li class ="<?php echo $paiement ?>">Paiement</a></li>
						<li class ="confirmation">Confirmation</a></li>

					</ul>

				</nav>

				<div class = "bouton_retour_progress">

					<a href = "panier_livraison.php?page=livraison" title = "Appuyer pour vous rendre à l'étape de la commande antérieur">sssssssss<br />sssssssss<br />sssssssss</a>

				</div>

			</div>

			<div class = "bloc_paiement_texte">

				<h2>Cliquez sur le logo du mode de paiement pour payer votre commande</h2>

				<h3>En cliquant sur un mode de paiement, je m'engage à payer le montant indiqué ci-dessus</h3>

				<p>En validant ma commande, je déclare avoir lu et accepté sans réserve les Conditions générales de Vente</p>

				<form method = "post" action = "panier_confirmation.php?page=confirmation">

					<div class = "bloc_paiement_choix">

						<label for = "paiement_choix_carte_bleue">

							<div class = "bloc_paiement_CB">

								<input type = "image" src = "images/paiement/CB.png" width = "75px" name = "carte_bleue" id = "carte_bleue">

							</div>

						</label>

						<label for = "paiement_choix_carte_visa">

							<div class = "bloc_paiement_visa">

								<input type = "image" src = "images/paiement/visa.png" width = "75px" name = "carte_visa" id = "carte_visa">

							</div>

						</label>

						<label for = "paiement_choix_carte_mastercard">

							<div class = "bloc_paiement_mastercard">

								<input type = "image" src = "images/paiement/mastercard.png" width = "75px" name = "carte_mastercard" id = "carte_mastercard">

							</div>

						</label>

						<label for = "paiement_choix_paypal">

							<div class = "bloc_paiement_paypal">

								<input type = "image" src = "images/paiement/paypal.png" width = "75px" name = "paypal" id = "paypal">

							</div>
										
						</label>
								
					</div>

				</form>

			</div>

		</div>

	</section>

<?php include('include/footer.php'); ?>