<?php 
include('include/header.php');
include('include/bddconnect.php'); 
?>

	<div class = "bloc_cible_formulaire">

		<?php

		if (empty($_SESSION['user'])) {
			header('location:se_connecter.php?erreur=reservation'); //On empêche l'utilisateur non connecté d'acceder à la page.
		}

			date_default_timezone_set('Europe/Paris'); //On récupère la date et l'heure correspondant à notre fuseau horaire.
			$date_today = date('Y-m-d-N');
			$date_1ans = date('Y-m-d-N', strtotime('+1 year'));
			$horaires_debut_midi = intval(12); //Déclaration de variable pour les horaires.
			$horaires_fin_midi = intval(14.30);
			$horaires_debut_soiree = intval(19);
			$horaires_fin_soiree = intval(22);

			if(isset($_POST['date']) AND isset($_POST['heure']) AND isset($_POST['nb_personnes']) AND !empty($_POST['date']) 
			AND !empty($_POST['heure']) AND !empty($_POST['nb_personnes'])) { //Verification de l'existence des variables et on vérifie si le formulaires à bien été remplis.

				$date = date($_POST['date']); //On récupère les données du formulaires.
				$heure = date($_POST['heure']);
				$nb_personnes = intval($_POST['nb_personnes']);
				$date_jour = date('N', strtotime($date));

					if ($date_today < $date) { //On regarde si le client n'essaye pas de réserver pour une date antérieur à aujourd'hui.

						if ($date_1ans > $date) { //On vérifie également qu'il n'essaye pas de réserver pour une date trop lointaine.

							if($date_jour != 1) { //1 = Lundi, on verifie que la reservation n'a pas lieu pour un lundi, car le restaurant est fermé à ce moment la.

								if($heure >= $horaires_debut_midi OR $heure <= $horaires_fin_midi 
									OR $heure >= $horaires_debut_soiree OR $heure <= $horaires_fin_soiree) { //On verifie que la réservation est conforme à nos horaires d'ouvertures. 																								
										if ($nb_personnes <= 12 AND $nb_personnes > 0) { //On vérifie que le nombre de personne à une table ne dépasse pas les limite indiqué.
													
											$date_format = date("d-m-Y", strtotime($date));
											$req_reservation = $bdd->prepare("INSERT INTO reservation(Idclient, date_reservation, heure_reservation, nb_place_reserve) VALUES (?,?,?,?)"); 
											$req_reservation->execute(array($_SESSION['user']['Idclient'], $date, $heure, $nb_personnes)); //On intègre la reservation à notre base de donnée.
											$message = 'Votre réservation pour le '.$date_format. ' à '.$heure. 'h pour '.$nb_personnes. ' personne a bien été pris en compte, merci de 
														vous présenter à notre restaurant à la date que vous avez convenus. <br/>
														Nous vous remercions de votre fidelité, à bientot dans notre restaurant Crep\'arts ! <br /> <br />
																
														Vous allez être rediriger dans quelque seconde, si vous ne souhaitez pas attendre, cliquer 
														<a href = "compte_reservation.php?page=reservation">ici</a>'; //Et on confirme la réservation à notre utilisateur.*
														header('refresh:3;mon_compte.php');

										} else {
											$erreur = 'Il semblerais que notre restaurant ne puisse accueillir tant de monde à une seule table, désolé !'; //Début des messages en fonction des erreurs commise par l'utilisateur.
										}

								} else {
									$erreur = 'Veuillez indiquer une heure conforme à nos horaires s\'il vous plait.';
								}

							} else {
								$erreur = 'Désolé mais nous somme fermé le lundi.';
							}

						} else {
							$erreur = 'Désolé nous ne prenons pas les réservations plus d\'un an à l\'avance.';
						}	
								
					} else {
						$erreur = 'Veuillez indiquer une date valide et supérieur à la date d\'aujourd\'hui s\'il vous plait.';
					}

			} else {
				$erreur = 'Erreur : Veuillez remplir tout les champs du formulaire !';
			}	

			if (isset($erreur)) { //On vérifie si il n'y à pas d'erreur, sinon on affiche le message de confirmation.
				$_SESSION['erreur'] = $erreur;
				$_SESSION['post'] = $_POST;
				header('location:reservation.php');

			} else {
				echo $message ;
				header('refresh:3;accueil.php');
			}

		?>

	</div>

<?php include('include/footer.php'); ?>