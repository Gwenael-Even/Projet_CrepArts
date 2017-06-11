<?php

	class panier {

		public function __construct() {

			if(!isset($_SESSION)) {
				session_start();
			}

			if(!isset($_SESSION['panier'])) {
				$_SESSION['panier'] = array();
			}

		}

		public function count() {
			return array_sum($_SESSION['panier']);

		}

		public function total() {

			$total = 0;

				$id_liste=array_keys($_SESSION['panier']);

					if(empty($id_liste)) {

						$produits = array();

					} else {

					include('include/bddconnect.php'); 

				 	$produits = $bdd->query('SELECT idprod, prix FROM produit WHERE idprod IN ('.implode(',' ,$id_liste).')');

					}

			foreach($produits as $produit_id => $produit) {

				$total += number_format($produit['prix']*$_SESSION['panier'][$produit['idprod']], 2, ',', ' ');
			}
			return $total;

		}

		public function add($produit_id) {
				
			if(isset($_SESSION['panier'][$produit_id])) {
				$_SESSION['panier'][$produit_id]++;


			} else {
				$_SESSION['panier'][$produit_id] = 1;
			}

		}
	}

?>