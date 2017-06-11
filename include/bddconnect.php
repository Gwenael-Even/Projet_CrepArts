<?php

	try { //A partir d'ici, connexion à la base de données.
					//Connexion à la bdd
			$bdd = new PDO('mysql:host=localhost;dbname=creparts;charset=utf8','root','');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) { /* On vérifie que ça se connecte bien, sinon message d'erreur. 
				(Ca évite de bousiller toute la page et de laisser des information sensible au visiteur) */ 
?>

			<div class = "contenue_bdderreur">

				<div class = "bdderreur">

					<?php

						die(
							'<span>
								Erreur : Désolé, le serveur est inaccessible pour le moment,<br /> 
								merci de réessayer plus tard !<br />
								<a href="accueil.php">Revenir à l\'accueil</a>
							</span>'
						);

					}

					?>

				</div>

			</div>