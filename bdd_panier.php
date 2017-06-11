<?php
include('include/header.php');
include('include/bddconnect.php');
?>

<?php
date_default_timezone_set('Europe/Paris');

$date_commande = date('Y-m-d-N');

if(!isset($_SESSION['panier']) AND !empty($_SESSION['panier'])) {
	header('location:accueil.php');

} else {
	$req_panier = $bdd->prepare("INSERT INTO commande_domicile(idclient,nb_prod_commande, facture, date_commande) VALUES (?,?,?,?)");
	$req_panier->execute(array($_SESSION['user']['Idclient'],$_SESSION['nb_produit'], $_SESSION['facture'], $date_commande));

	$id_liste=array_keys($_SESSION['panier']);

	if(empty($id_liste)) {

	$produits = array();

	} else {

	$produits = $bdd->query('SELECT * FROM produit WHERE idprod IN ('.implode(',' ,$id_liste).')'); //On récupère tout les id se trouvant dans le panier pour en récuperer les info.

	}

		foreach($produits as $produit) {
		$req_panier = $bdd->prepare('SELECT MAX(idcommande) as maxidcommande FROM commande_domicile WHERE idclient = ?');
		$req_panier->execute(array($_SESSION['user']['Idclient']));
		$info_client = $req_panier->fetch();
		$req_panier = $bdd->prepare("INSERT INTO ligne_commande(idcommande,idprod,produit_command, quantite) VALUES (?,?,?,?)");
		$req_panier->execute(array($info_client['maxidcommande'], $produit['idprod'], $produit['libelle'], $_SESSION['panier'][$produit['idprod']]));

		}

}
			unset($_SESSION['panier']);  //Fermeture de la requete.
			$req_panier->closeCursor();
?>

<div class = "bloc_cible_formulaire">
	<p> Votre commande à bien été confirmé, la livraison se fera dans un temps compris entre 30 et 45 minute en fonction de l'endroit ou vous vous trouvez <br />
		Creparts vous remercie de votre commande et espère vous revoir bientot, en restaurant ou sur notre site internet. </p>
		<?php header('refresh:3;accueil.php'); ?>
</div>

<?php include('include/footer.php'); ?>