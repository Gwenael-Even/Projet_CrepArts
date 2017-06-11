<?php include('include/header.php');
	  include('include/bddconnect.php'); ?>

	<div class = "bloc_cible_formulaire">

		<?php
	

			if(!empty($_POST['email']) AND !empty($_POST['pass']) And !empty($_POST['pass2']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date_naissance']) AND !empty($_POST['adresse']) AND !empty($_POST['code_postal']) AND !empty($_POST['numtel']) AND !empty($_POST['ville']) AND !empty($_POST['question_secrete']) AND !empty($_POST['reponse_secrete'])) { // On vérifie que tout les champs ont été remplis.

				$email = htmlspecialchars($_POST['email']); //On fait en sorte d'intégrer les variables avec quelque mesure de sécurité.
				$pass = sha1($_POST['pass']); //sha1 = cryptage du mot de passe.
				$pass2 = sha1($_POST['pass2']);
				$nom = htmlspecialchars($_POST['nom']);
				$prenom = htmlspecialchars($_POST['prenom']);
				$date_naissance = htmlspecialchars($_POST['date_naissance']);
				$adresse = htmlspecialchars($_POST['adresse']);
				$code_postal = intval($_POST['code_postal']);
				$numtel = intval($_POST['numtel']);
				$ville = htmlspecialchars($_POST['ville']);
				$question_secrete = htmlspecialchars($_POST['question_secrete']);
				$reponse_secrete = htmlspecialchars($_POST['reponse_secrete']);
				$taille_email = strlen($email);
						
				if ($taille_email < 50) { //Verification de la taille de l'adresse email

					if ($pass == $pass2) { //Verification de l'équivalence des deux mots de passe

						if(ctype_digit($code_postal)) {

							if(ctype_digit($numtel)) {

								if(filter_var($email, FILTER_VALIDATE_EMAIL)) {	 //Verification de la validité de l'adresse email

									$reqmail = $bdd->prepare("SELECT * FROM client WHERE email = ?");
									$reqmail->execute(array($email));
									$mailexist = $reqmail->rowCount();
			   					    //Verification de l'existence de l'email, si égale à 0, l'email n'existe pas encore dans la base de données.
									
									if ($mailexist == 0) {

										$insertclient = $bdd->prepare('INSERT INTO client(email, password, nom, prenom, date_naissance, adresse, ville, code_postal, numtel, question_secrete, reponse_secrete) 
																		VALUES (?,?,?,?,?,?,?,?,?,?,?)');
										$insertclient->execute(array($email, $pass, $nom, $prenom, $date_naissance, $adresse, $ville, $code_postal, $numtel, $question_secrete, $reponse_secrete));
									
										$message = 'Votre compte à bien été crée. <br /> <br />
													Vous pouvez maintenant profiter de tout les services proposer par notre site web. <br /> <br />
													<a href = "se_connecter.php">Cliquer ici pour vous connecter directement.</a>'; //Message de validation pour l'utilisateur

									} else {
										$erreur = 'Erreur : Cette email existe déjà'; //Affiches des messages en fonction de l'erreur.
									}

								} else 	{
									$erreur = 'Erreur : Votre email n\'est pas valide ! <br />';
										        
								}

							} else {
								$erreur = 'Erreur : Votre numéro de télephone ne semble pas valide ! <br />';
											
							}

						} else {
							$erreur = 'Erreur : Votre code postal ne semble pas valide ! <br />';
										
						}

					} else {
						$erreur = 'Erreur : Vos mots de passe ne correspondent pas ! <br />';
								    
					}

				} else {
					$erreur = 'Erreur : Votre email est trop long ! <br />';
							   	
				}

			} else {
				$erreur = 'Erreur : Veuillez remplir tout les formulaires ! <br />';
							
			}

			if (!empty($erreur)) { //Si il y une erreur, on l'affiche..
				$_SESSION['erreur'] = $erreur;
				$_SESSION['post'] = $_POST;
				header('location:inscription.php');

			} else {
				echo $message; //.. sinon on affiche la variable message "Votre compte à bien été crée".
				header('refresh:3;inscription.php');
			}	
							
		?> <!-- Fin du php -->

	</div>
		
<?php include('include/footer.php'); ?> <!-- Permet d'acceder à toute la partie "Footer" grâce au fichier Footer.php -->