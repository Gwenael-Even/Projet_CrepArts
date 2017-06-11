<?php

	session_start();
	setcookie('email', '', time()+60/60/24/30, null, null, false, true); //effacement des cookies
	setcookie('password', '', time()+60/60/24/30, null, null, false, true);

	if ($_SESSION) {
		session_destroy();
		header('refresh:3;accueil.php');

	} else {
		header('location:accueil.php');
	}

?>

<?php include('include/header.php'); ?>

	<div class = "bloc_cible_formulaire">

			<p> Vous avez bien été déconnecté, vous allez être redirigé à l'accueil, si vous ne souhaitez pas attendre, vous pouvez cliquer 
				<a href ="mon_compte.php">ici</a> <br /><br />
				Nous vous remercions de votre visite sur Crep-art.fr, nous espérons vous revoir bientôt !
			</p>

	</div>
	
<?php include('include/footer.php');?>