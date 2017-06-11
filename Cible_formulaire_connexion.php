<?php include ('include/header.php'); 
	  include ("include/bddconnect.php"); ?>

	<div class = "bloc_cible_formulaire">

		<?php 
	
			if(!empty($_POST['emailconnect']) AND !empty($_POST['passconnect'])) { //On veut que le formulaire soit entierement remplis.
				$emailconnect = htmlspecialchars($_POST['emailconnect']);
				$passconnect = sha1($_POST['passconnect']);

				$clientconnect = $bdd->prepare("SELECT * FROM client WHERE email = ? AND password = ?"); //On va chercher dans la bdd si les info donnée par le formulaires sont vrai
				$clientconnect->execute(array($emailconnect, $passconnect));
				$clientexist = $clientconnect->rowCount();

				if($clientexist == 1) {

					if(isset($_POST['se_souvenir'])) {
						
						setcookie('email', $emailconnect, time()+60*60*24*30, null, null, false, true); //On ajoute les cookies si la case "Se souvenir de moi" est cochée.
						setcookie('password', $passconnect, time()+60*60*24*30, null, null, false, true);
					}

					$info_client = $clientconnect->fetch(); //On va chercher les info du clients
					$_SESSION['user']['email'] = $info_client['email'];
					$_SESSION['user']['password'] = $info_client['password'];
					$_SESSION['user']['prenom']= $info_client['prenom'];
					$_SESSION['user']['nom']= $info_client['nom'];
					$_SESSION['user']['date_naissance']= $info_client['date_naissance'];
					$_SESSION['user']['adresse']= $info_client['adresse'];
					$_SESSION['user']['ville']= $info_client['ville'];
					$_SESSION['user']['code_postal']= $info_client['code_postal'];
					$_SESSION['user']['numtel']= $info_client['numtel'];
					$_SESSION['user']['Idclient']= $info_client['Idclient'];
					$message = 'Connexion réussie, vous allez être redirigé dans quelques secondes, si vous ne voulez pas attendre<br />
								cliquer <a href ="mon_compte.php">ici</a> Pour retourner à l\'accueil';

					} else {
						$erreur = 'Erreur : Email ou mot de passe incorrect !';
									
					}	

				} else {
					$erreur= 'Tout les champs doivent être remplis !';
				}
							
			if (!empty($erreur)) {
				$_SESSION['erreur'] = $erreur;
				$_SESSION['post'] = $_POST;
				header('location:se_connecter.php');

			} else {
				echo $message;
				header('refresh:3;mon_compte.php');
			}

		?>

	</div>

<?php include('include/footer.php'); ?> <!-- Permet d'acceder à toute la partie "Footer" grâce au fichier Footer.php -->