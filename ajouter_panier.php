<?php

	include('include/bddconnect.php');
	require 'panier.class.php';
	$panier = new panier();


	if(empty($_SESSION['user'])) { 
		die(header('location:se_connecter.php?erreur=panier')); 
	}


	if(isset($_GET['id'])) {

		$produit = $bdd->prepare("SELECT * FROM produit WHERE idprod = ?");
		$produit->execute(array($_GET['id']));
		$produit_id = $produit->fetchAll();
		$produit_exist = $produit->rowCount();

		if($produit_exist == 1) {

			$panier->add($produit_id[$quantite = 0]['idprod']);
			die(header('location:panier.php'));
			
		} else {

			die('Ce produit n\'existe pas');

		}

	} else {

		die('Vous n\'avez pas séléctionné de produit à ajouter au panier');

	}
	
?>
