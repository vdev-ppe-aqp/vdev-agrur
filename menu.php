<?php
	session_start();

	if(!isset($_SESSION))
	{	
		//Redirige l'utilisateur vers le formulaire de connexion s'il n'est pas connecté
		header('Location: authentifier.php');
	}
?>

<!DOCTYPE html>
<html lang="FR">
	<head>
		<title>AGRUR - Principal</title>
		<?php include('head.html'); ?>

		<link rel="stylesheet" type="text/css" href="css/communs.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
	</head>

	<body>
		<header>
			<?php include('header.php'); ?>
		</header>

		<section style="margin-top:50px;">
			<h3>Bienvenue sur votre panneau de gestion <?php echo($_SESSION['nom']); ?> !</h3>

			<?php
			if(isset($_SESSION['admin']))
			{
			?>
				<ul id="form_link">
					<li><a href="gestionProducteurs.php">Gestion des producteurs</a></li>
					<li><a href="gestionDroits.php">Gestion des droits</a></li>
				</ul>
			<?php
			}
			else
			{
			?>
				<ul id="form_link">
					<li><img src="images/user_icon.png" height="50" align="absmiddle"><a href="modifProducteur.php">  Modifier mes informations</a></li>
					<li><img src="images/commandes_icon.png" height="50" align="absmiddle"><a href="gestionCommandes.php">  Gérer mes commandes</a></li>
					<li><img src="images/representant_icon.png" height="50" align="absmiddle"><a href="modifRepresentant.php">  Mon représentant</a></li>
				</ul>

				<hr>

				<ul id="form_link">
					<li><img src="images/shutdown_icon.png" height="50" align="absmiddle"><a href="deco.php">Fermer ma session</a></span></li>
				</ul>
			<?php
			}
			?>
		</section>
	</body>
</html>