<?php
	session_start();

	//On vérifie si l'utilisateur est déjà connecté
	if(isset($_SESSION['connecte']))
	{
		//On redirige l'utilisateur vers la page d'accueil
		header('Location: menu.php');
	}


	//Gestion des messages d'erreurs
	if(isset($_GET['err']))
	{
		switch($_GET['err'])
		{
			case 1:
				$message = 'Au moins un des champs n\'est pas saisi';
			break;
			case 2:
				$message = 'Aucun utilisateur ne correspond aux informations saisies';
			break;
			case 3:
				$message = 'Erreur dans la communication des informations (rq)';
			default:
			break;
		}

		$message = ('<span id="msg_err">'.$message.'</span>');
	}

	//on teste si le visiteur a soumis le formulaire de connexion
	if(isset($_POST['txt_mail']) && (!empty($_POST['txt_mail'])) && (isset($_POST['pw_mdp'])) && (!empty($_POST['pw_mdp'])))
	{
		if(!empty($_POST['txt_mail']) && !empty($_POST['pw_mdp']))
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
				header('Location: authentifier.php?err=1');
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
					$req->setFetchMode(PDO::FETCH_ASSOC);
					$enregistrement = $req->fetch();
					//ferme le cursor
					$req->closeCursor();
				}
				catch(Exception $e)
				{
					header('Location: authentifier.php?err=3');
				}

				$_SESSION['connecte'] = true;
				$_SESSION['id'] = $enregistrement['id'];
				$_SESSION['nom'] = $enregistrement['nom'];
			
				header('Location: menu.php');
			}
			elseif($num == 0)
			{
				header('Location: authentifier.php?err=2');
			}
		}
		else
		{
			header('Location: authentifier.php?err=1');
		}
	}
	?>

<!DOCTYPE html>
<html lang="FR">
	<head>
		<title>AGRUR - Authentification</title>
		<?php include('head.html'); ?>

		<link rel="stylesheet" type="text/css" href="css/communs.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
	</head>

	<body>
		<header>
			<?php include('header.php'); ?>
		</header>

		<section class="formulaire" style="margin-top:50px;">
			<h3>Connexion :</h3>
			<p>
				Connectez-vous pour pouvoir accéder à votre profil et à 
				vos services.
			</p>

			<?php
			//Affiche le message d'erreur si celui-ci existe
			if(isset($message))
			{
				echo($message);
			}
			?>

			<form method="POST" action="authentifier.php">
				<input type="text" name="txt_mail" id="form_txt" required="required" placeholder="Adresse mail"><br />
				<input type="password" name="pw_mdp" id="form_txt" required="required" placeholder='Mot de passe'><br />
				<input type="submit" name="btn_validation" id="btn_validation" value="Connexion">
			</form>

			<span id="form_link"><a href="#">Créer un compte</a></span>			
		</section>
	</body>
</html>