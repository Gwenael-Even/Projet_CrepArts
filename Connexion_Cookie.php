<?php 

	if (!isset($_SESSION['idclient']) AND !isset($_COOKIE['email'],$_COOKIE['password']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password'])) {

			$clientconnect = $bdd->prepare("SELECT * FROM client WHERE email = ? AND password = ?");
			$clientconnect->execute(array($_COOKIE['email'],$_COOKIE['email']));
			
			if($clientexist == 1) {
				$info_client = $clientconnect->fetch(); //On va chercher les info du clients
				$_SESSION['email'] = $info_client['email'];
				$_SESSION['password'] = $info_client['password'];
				$_SESSION['prenom']= $info_client['prenom'];
				$_SESSION['nom']= $info_client['nom'];
				$_SESSION['date_naissance']= $info_client['date_naissance'];
				$_SESSION['adresse']= $info_client['adresse'];
				$_SESSION['ville']= $info_client['ville'];
				$_SESSION['code_postal']= $info_client['code_postal'];
				$_SESSION['numtel']= $info_client['numtel'];
				$_SESSION['Idclient']= $info_client['Idclient'];
			}
			
	}

?>