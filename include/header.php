<?php
session_start();

	require'include/_header.php';

	include_once('Connexion_Cookie.php'); //Demmarage de la session + on inclue une fois le fichier des cookies.
	if(!empty($_SESSION['panier'])) {

	$prix_total_tout = number_format($panier->total(), 2, ',', ' ');
	$nb_produit = $panier->count();	
	$_SESSION['nb_produit'] = $nb_produit;
	
	}		
?>

<!DOCTYPE html>
	<html lang = "fr">

		<head>

			<meta charset = "utf-8">
			<link rel = "icon" type = "image/png" href = "/images/favicon.ico" />
			<link rel = "stylesheet" href = "style.css"/>
			<title>CREP'ART</title>

		</head>
		
		<body>
		
			<div id = "global">

				<header>

					<nav id = "bloc_menu">

						<ul id = "menu">

							<!-- Menu de navigation -->

							<li><a href = "la_carte.php">La carte</a></li>
							<li><a href = "reservation.php">Réservation</a></li>
							<li><a href = "Accueil.php"><img width = 150px src = "images/Logo_CREP_ART.png" alt = "Logo de CREP'ART" title = "Appuyer pour se rendre sur l'accueil"></a></li>
							<li><a href = "mon_compte.php">Mon compte</a></li>
							<li><a href = "nos_valeurs.php">Nos valeurs</a></li>						
						
						</ul>
						
					</nav>

					<div id = "sous_tete">

						<div class = "echo_sous_tete">

							<div class = "marquee">

								<?php 
									if (!empty($_SESSION['user'])) { ?>
										 <!-- Ca c'est la bannnière qui bouge + on vérifie si l'utilisateur est connecté ou non. -->
										<marquee direction = "left" scrollamount = "10" onMouseOver = "this.stop();" onMouseOut="this.start();">
										Bonjour <?= $_SESSION['user']['prenom'].' '.$_SESSION['user']['nom']; ?> Merci de votre visite sur notre site Crep'arts ! Nous espérons vous voir bientôt dans notre restaurant !
										<a href ="deconnexion.php">Déconnexion</a>
										</marquee>

								<?php } else { ?>

										 <marquee direction = "left" scrollamount = "10" onMouseOver = "this.stop();" onMouseOut = "this.start();"> 
										 	Bonjour cher visiteur, vous pouvez vous <a href="inscription.php">inscrire</a> ou vous <a href="se_connecter.php">connecter</a>, en cliquant sur les liens ou en allant sur l'onglet "Mon compte" et ainsi profiter de tout nos services tel que la livraison à domicile ou la réservation en ligne.
										 </marquee>

								<?php } ?>
								
							</div>

							<div id = "bloc_panier"> <!-- Logo du panier -->



								<div class = "lien_bloc">

									<a href = "panier.php">hiddenhiddenhidden</a>

								</div>

								<span class = "texte_panier">Mon panier</span>

								<div class = "image_panier">

									<a href = "panier.php"><img width = 42px src = "images/ajouter_panier.png" alt = "Logo du panier"></a>

								</div>						

								<div class = "montant_panier">

									<?php if (!empty($_SESSION['user'])):
											if(!empty($_SESSION['panier'])):
									?>

										<span><?= $prix_total_tout .'€'?></span><br />

										<span class = "nbproduit_header"><?= $nb_produit. ' produit'; ?></span>

									<?php endif;
										  endif;
									?>
								</div>

							</div>
						
						</div>

					</div>
				
				</header>