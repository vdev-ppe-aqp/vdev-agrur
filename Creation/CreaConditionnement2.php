<html>
	<head>
		<meta charset type='UTF-8'>
	</head>
	<body>
	<center><h2>Insertion de données dans la table </h2></center>
		<form>
			<label>Type de conditionnement</label><input type='textbox' id='T_Conditionnement'>
			<label>Libelle du conditionnement</label><input type='textbox' id='Li_Conditionnement'>
			<label>Poids estimé de la commande</label><input type='textbox' id='Poids_Commande'>
			<input type='submit' id='button2' text='Insérer'>
		</form>
	</body>
</html>
<?php
	//Connexion à la base [A modifier] : 
	
	$base=mysqli_connect("localhost,"toto","1234","Conditionnement");
	if ($base){
		echo 'Connexion réussi';
	}else
	{
		echo 'Connexion non réussi';
	//Selection de la table
	
	$Producteur=mysqli_select_db($base,"Conditionnement");
	
	//Insertion des variables : 
	
	$id_Conditionnement=rand(1000,9999);
	$T_Producteur=$_POST['T_Producteur'];
	$Li_Producteur=$_POST['Li_Producteur'];
	$Poids_Conditionnement=$_POST['Poids_Producteur'];
	
	//Insertion de la donné dans la base : 
	$boolean = mysqli_query=($base,'INSERT INTO',$Conditionnement,'(id_conditionnement,type_conditionnement,libelle_conditionnement,poids_conditionnement) VALUES ('$id_Conditionnement','$T_Conditionnement','$Li_Conditionnement','$Poids_Conditionnement')'
	if ($boolean=FALSE){
		echo "Echec de l'insertion";
	}else
	{
		echo "Réussite de l'insertion";
	}
	
?>