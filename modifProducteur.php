<?php 
	session_start();

	//Vérifie que la variable $_GET est initialisée
	if(isset($_GET['msg']))
	{
		switch($_GET['msg'])
		{
			case 1:
				$message = ('<span id="msg_err">Erreur lié à la base de données</span>');
			break;
			case 2:
				$message = ('<span id="msg_err">Au moins un des champs est vide</span>');
			break;
			case 3:
				$message = ('<span id="msg_err">Au moins un des champs ne respecte pas les critères</span>');
			break;
			case 4:
				$message = ('<span id="msg_suc">Informations enregistrées !</span>');
			break;
			default:
			break;
		}
	}

	//Connexion à la base de données
	require('connexion_BDD.php');

	//Requete pour afficher les informations du producteur connecté
	$sql = ('SELECT * FROM producteur WHERE num_prod = 1');
	try
	{
		$resultat = $connexion->query($sql);
		while($ligne = $resultat->fetch())
		{
			$adresse = $ligne['adresse_prod'];
			$nom_rep = $ligne['nom_representant_prod'];
			$prenom_rep = $ligne['prenom_representant_prod'];
			$societe = $ligne['societe'];
			$date_adhesion = $ligne['date_adhesion'];
		}
	}
	catch(Exception $ex)
	{
		echo('Erreur SELECT :'.$ex->getMessage());
	}
	finally
	{
		$resultat->closeCursor();
	}



	if(isset($_POST['txt_adresse']) && isset($_POST['txt_nom_rep']) && isset($_POST['txt_prenom_rep']) && isset($_POST['txt_societe']))
	{
		if(!empty($_POST['txt_adresse']) && !empty($_POST['txt_nom_rep']) && !empty($_POST['txt_prenom_rep']) && !empty($_POST['txt_societe']))
		{
			$requetePrepa = $connexion->prepare('UPDATE producteur SET adresse_prod = :adresse, nom_representant_prod = :nom_representant_prod, prenom_representant_prod = :prenom_representant_prod, societe = :societe');
			$requetePrepa->bindParam(':adresse', $_POST['txt_adresse']);
			$requetePrepa->bindParam(':nom_representant_prod', $_POST['txt_nom_rep']);
			$requetePrepa->bindParam(':prenom_representant_prod', $_POST['txt_prenom_rep']);
			$requetePrepa->bindParam(':societe', $_POST['societe']);

			try
			{
				$succes = $requetePrepa->execute();
				if($succes)
				{
					header('Location: modifProducteur.php?msg=4');
				}
			}
			catch(Exception $ex)
			{
				header('Location: modifProducteur.php?msg=1');
			}
		}
		else
		{
			header('Location: modifProducteur.php?msg=2');
		}
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>AGRUR - Modifier mes informations</title>
		<?php include('head.html'); ?>

		<link rel="stylesheet" type="text/css" href="css/communs.css">
		<link rel="stylesheet" type="text/css" href="css/general.css">
	</head>
	
	<body>
		<header>
			<?php include('header.php'); ?>
		</header>

		<section style="margin-top:50px;">
			<h3 style="text-align:center;">Modifier mes informations</h3>

			<?php
				//Affiche un message si nécessaire
				if(isset($message))
				{
					echo($message);
				}
			?>

			<form method="POST" action="modifProducteur.php">
				<table>
					<tr>
						<td><label for="txt_nom">Nom :</label></td>
						<td><input type="textbox" name="txt_nom" id="form_txt" disabled="disabled" value="<?php //echo($nom);?>"></td>
					</tr>
					<tr>
						<td><label for="txt_prenom">Prénom :</label></td>
						<td><input type="textbpx" name="txt_prenom" id="form_txt" disabled="disabled" value="<?php //echo($prenom);?>"></td>
					</tr>
					<tr>
						<td><label for="txt_adresse">Adresse :</label></td>
						<td><input type="textbox" name="txt_adresse" id="form_txt" value="<?php echo($adresse); ?>" placholder="Adresse"></td>
					</tr>
					<tr>
						<td><label for="txt_nom_rep">Nom de votre représentant :</label></td>
						<td><input type="textbox"  name="txt_nom_rep" id="form_txt" value="<?php echo($nom_rep); ?>" placeholder="Nom de votre réprésentant"></td>
					</tr>
					<tr>
						<td><label for="txt_prenom_rep">Prénom de votre réprésentant :</label></td>
						<td><input type="textbox" name="txt_prenom_rep" id="form_txt" value="<?php echo($prenom_rep); ?>" placeholder="Prénom de votre représentant">
					</tr>
					<tr>
						<td><label for="txt_societe">Société :</label></td>
						<td><input type="textbox" name="txt_societe" id="form_txt" value="<?php echo($societe); ?>" placeholder="Société">
					</tr>
					<tr>
						<td><label for="txt_date">Date d'adhésion :</label></td>
						<td><input type="textbox" name="txt_date" id="form_txt" disabled="disabled" value="<?php echo($date_adhesion); ?>"></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><input type="submit" name="btn_ok" id="btn_validation" value="Enregistrer"></td>
					</tr>	
				</table>
			</form>
		</section>
	</body>
</html>