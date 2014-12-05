<?php
	session_start();

	//Importation du fichier de configuration
	//Ce fichier contient toutes les informations nécessaires au fonctionnement de l'application
	//Tel que le profil mysql, le repertoire de l'application
	require_once('agrur_config.php');


	//Si l'utilisateur est déjà connecté, on le redirige vers le menu
	if(isset($_SESSION['login']))
	{
		header('Location: index.php');
	}


	//Si $_GET['err'] est initialisé...
	//Cette variable est initialisée lorsqu'une erreur survient au moment de la connexion de l'utilisateur.
	if(isset($_GET['err']))
	{
		switch($_GET['err'])
		{
			case 1:
				$message = 'Au moins un des champs n\'est pas rempli.';
			break;
			case 2:
				$message = 'Erreur : Plusieurs utilisateurs utilisent ce compte.';
			break;
			case 3:
				$message = 'Aucun utilisateur ne correspond à ces identifiants.';
			default:
			break;
		}

		$message = ('<span id="msg_err">'.$message.'</span>');
	}

	//On vérifie que tous les champs sont initialisés et rempis
	if (isset($_POST['txt_mail']) && isset($_POST['pw_mdp']))
	{
		if(!empty($_POST['txt_mail']) && !empty($_POST['pw_mdp']))
		{
			//On encrypte le mot de passe
			$mdp = sha1($_POST['pw_mdp']);

			//Inclu le script de connexion à la base de données
			require_once('connexion_BDD.php');

			try
			{
				// on teste si une entrée de la base contient ce couple login / pass
				//prepare la requete
				$requetePrepa = $connexion->prepare('SELECT count(*) AS num FROM utilisateur WHERE mail=:mail AND mdp=:mdp');
				$requetePrepa->bindParam(':mail', $_POST['txt_mail']);
				$requetePrepa->bindParam(':mdp', $mdp);
				//execute la requete
				$requetePrepa->execute();
			}
			catch (Exception $e)
			{
				echo 'Erreur de requête : ', $e->getMessage();
            	header("refresh:3 ;url= login.php");
			}

			//recupere le nombre de colonne
			$num=$requetePrepa->fetchColumn();
		
			//ferme le cursor
			$requetePrepa->closeCursor();
		
			// si on obtient une réponse, alors l'utilisateur est un membre
			if ( $num == 1) 
			{
				try
				{
					//prepare la requete
					$req_con = $connexion->prepare('SELECT id, nom FROM utilisateur WHERE mail=:mail AND mdp=:mdp');
					$req_con->bindParam(':mail', $_POST['txt_mail']);
					$req_con->bindParam(':mdp', $mdp);

					//execute la requete
					$req_con->execute();
					//recuperation des données
					$req_con->setFetchMode(PDO::FETCH_ASSOC);
					$enregistrement = $req_con->fetch();
					//ferme le cursor
					$req_con->closeCursor();

				}
				catch(Exception $e)
				{
					echo 'Erreur de requête : ', $e->getMessage();
               		header("refresh:5 ;url:login.php");
				}
			
				$_SESSION['id'] = $enregistrement['id'];
				$_SESSION['nom'] = $enregistrement['nom'];
				echo('Nom : ' . $_SESSION['nom']);

				//Redirection vers le menu
				//header("Location: index.php");
			}
			// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
			elseif ($num == 0) 
			{
				header('location: login.php?err=3');
			}
			// sinon, alors la, il y a un gros problème :)
			else 
			{
				header('location: login.php?err=2');
			}
		}	
		else 
		{
			header('location: login.php?err=1');
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<?php include('head.html'); ?>


		<link rel="stylesheet" type="text/css" href="css/communs.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
	</head>

	<body>
		<header>
			<?php include('header.php'); ?>
		</header>

		<div class="connexion" style="margin-top:50px;">
			<h3>Connexion :</h3>

			<?php
				if(isset($message))
				{
					echo($message);
				}
			?>

			<p>Connectez vous pour accéder à votre profil et à vos services.</p>

			<form method="POST" action="login.php">
				<input type="text" name="txt_mail" id="form_txt" placeholder="Adresse mail"><br />
				<input type="password" name="pw_mdp" id="form_txt" placeholder="Mot de passe"><br />

				<input type="submit" name="btn_validation" id="btn_validation" value="Connexion">
			</form>

			<span id="form_link"><a href="#">Cliquez ici pour créer un compte</p></span>
		</div>
	</body>
</html>


