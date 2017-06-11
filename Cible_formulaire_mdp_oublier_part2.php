<?php
include('include/header.php');
include('include/bddconnect.php');
?>

<div class = "bloc_cible_formulaire">

<?php

	if(!isset($_SESSION['flash']['email_mdp'])) { header('location:accueil.php'); }
	
	if(isset($_POST['question_secrete']) AND isset($_POST['reponse_secrete']) 
		AND !empty($_POST['question_secrete']) AND !empty($_POST['reponse_secrete'])) {

		$question_secrete = htmlspecialchars($_POST['question_secrete']);
		$reponse_secrete = htmlspecialchars($_POST['reponse_secrete']);

		$req_mdp = $bdd->prepare("SELECT question_secrete, reponse_secrete 
			FROM client WHERE question_secrete = ? AND reponse_secrete = ?");

		$req_mdp->execute(array($question_secrete, $reponse_secrete));

		$clientexist = $req_mdp->rowcount();

		if ($clientexist == 1) {
			header('location:mdp_oublier_part3.php');

		} else {
			$erreur = 'La question et la réponse secrète ne correspondent pas';
		}

	} else {
		$erreur = 'Veuillez remplir tout les champs du formulaires !';
	}

if(isset($erreur)) {
	$_SESSION['erreur'] = $erreur;
	$_SESSION['post'] = $_POST;
	header('location:javascript:history.back()');
}

?>


</div>

<?php
include('include/footer.php');
?>