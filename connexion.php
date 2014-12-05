<?php
	session_start();

	//on teste si le visiteur a soumis le formulaire de connexion
	if(isset($_POST['txt_mail']) && (!empty($_POST['txt_mail'])) && (isset($_POST['pw_mdp'])) && (!empty($_POST['pw_mdp'])))
	{
		require_once('connexion_BDD.php');
		try
		{
			//on test si une entrée de la base ce couple login/ pass
			$requetePrepa = $connexion->prepare('SELECT count(*) AS num FROM utilisateur WHERE mail=:mail AND mdp=:mdp');
			$requetePrepa->bindParam(':mail', $_POST['txt_mail']);
			$requetePrepa->bindParam(':mdp', $_POST['pw_mdp']);
			//execute la requete
			$requetePrepa->execute();
		}
		catch(Execption $e)
		{
			header('Location: connexion.php?err=base');
		}
		//recupere le nombre de colonne
		$num = $requetePrepa->fetchColumn();
		//ferme le cursor
		$requetePrepa->closeCursor();
		//si on obtient une réponse, alors l'utilisateur est un membre 
		if($num == 1)
		{
			try
			{
				//prepare la requete
				$req = $connexion->prepare('SELECT * FROM utilisateur WHERE mail=:mail AND mdp=:mdp');
				$req->bindParam(':mail', $_POST['txt_mail']);
				$req->bindParam(':mdp', $_POST['pw_mdp']);

				//execute la requete
				$req->execute();
				//recuperation des données
				$req-setFetchMode(PDO::FETCH_ASSOC);
				$enregistrement = $req->fetch();
				//ferme le cursor
				$req->closeCursor();
			}
			catch(Exception $e)
			{
				header('Location: connexion.php?err=base');
			}

			$_SESSION['connecte'] = true;
			$_SESSION['id'] = $enregistrement['id'];
			$_SESSION['nom'] = $enregistrement['nom'];
			
			echo('Connecté !');
		}
		elseif($num == 0)
		{
			header('Location: connexion.php?err=id');
		}
		else
		{
			header('Location: connexion.php?err=inconnue');
		}
	}
	?>

<!DOCTYPE html>
<html lang="FR">
	<head>
		<title>AGRUR - Connexion</title>
		<?php 
			include('head.html');
		?>

		<link rel="stylesheet" type="text/css" href="css/communs.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">

	</head>

	<body>
		<header>
			<?php include('header.php'); ?>
		</header>

		<div class="connexion" style="margin-top:50px;">
			<?php
				if(!isset($_SESSION['connecte']))
				{
				?>
					<h3>Connexion :</h3>

					<p>
						Connectez-vous pour pouvoir accéder à votre profil et à 
						vos services.
					</p>

					<form method="POST" action="connexion.php">
						<input type="text" name="txt_mail" id="form_txt" placeholder="Adresse mail"><br />
						<input type="password" name="pw_mdp" id="form_txt" placeholder='Mot de passe'><br />
						<input type="submit" name="btn_validation" id="btn_validation" value="Connexion">
					</form>

					<span id="form_link"><a href="#">Cliquez pour vous inscrire</a></span>			
				<?php
				}
				else
				{
				?>
					<h3>Que voulez-vous faire ?</h3>
					<ul>
						<li>Voir mes informations</li>
						<li>Suivre mes commandes</li>
					</ul>
				<?php
				}
				?>
		</div>

	</body>
</html>