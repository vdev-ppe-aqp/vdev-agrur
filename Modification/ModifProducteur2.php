<?php 
	session_start();

	//Connexion à la base de données
	require('../connexion_BDD.php');

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
		if(!empty($_POST['txt_nom']) && isset($_POST['txt_prenom']) && isset($_POST['txt_adresse']) && isset($_POST['txt_nom_rep']) && isset($_POST['txt_prenom_rep']) && isset($_POST['txt_societe']))
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
					echo('Enregristrement réussi');
				}
			}
			catch(Exception $ex)
			{
				echo('Erreur UPDATE : '.$ex->getMessage());
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>AGRUR - Modifier mes informations</title>
		<?php include('../head.html'); ?>

		<link rel="stylesheet" type="text/css" href="../css/communs.css">
		<link rel="stylesheet" type="text/css" href="../css/general.css">
	</head>
	
	<body>
		<header>
			<?php include('../header.php'); ?>
		</header>

		<section style="margin-top:50px;">
			<form method="POST" action="modifProducteur.php">
				<table>
					<tr>
						<td><label>Nom :</label></td>
						<td><?php //echo($nom);?></td>
					</tr>
					<tr>
						<td><label>Prénom :</label></td>
						<td><?php //echo($prenom);?></td>
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