<!DOCTYPE html>
<html lang="FR">
	<head>
		<title>AGRUR - Connexion</title>
		<?php 
			include('head.html');
			/*
			require_once('connexionbdd.php');
			*/
		?>

		<link rel="stylesheet" type="text/css" href="css/communs.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">

		<!--Rafraichissement automatique dev aperçu-->
		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
	</head>

	<body>
		<header>
			<?php include('header.php'); ?>
		</header>

		<div class="connexion" style="margin-top:50px;">
			<h3>Connexion :</h3>

			<p>
				Connectez-vous pour pouvoir accéder à votre profil et à 
				vos services.
			</p>

			<form method="POST" action="login.php">
				<input type="text" name="txt_mail" id="form_txt" placeholder="Adresse mail"><br />
				<input type="password" name="pw_mdp" id="form_txt" placeholder='Mot de passe'><br />

				<input type="submit" name="btn_validation" id="btn_validation" value="Connexion">
			</form>

			<span id="form_link"><a href="#">Cliquez pour vous inscrire</a></span>
		</div>

	</body>
</html>