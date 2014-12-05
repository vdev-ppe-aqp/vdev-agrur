<html>
	<head>
		<meta charset='UTF-8'>
	</head>
	<body>
	<center><h2>Insertion de données dans la table </h2></center>
		<form method=POST action="CreaConditionnement.php">
			<label>Type de conditionnement</label><input type='textbox' name='T_Conditionnement'>
			<label>Libelle du conditionnement</label><input type='textbox' name='Li_Conditionnement'>
			<label>Poids estimé de la commande</label><input type='textbox' name='Poids_Commande'>
			<input type='submit' id='button2' text='Insérer'>
		</form>
		<a href="MenuCrea.php">Menu</a>
	</body>
</html>
<?php

	$connect=mysqli_connect("localhost","root","");
	$bdd="agrur";
	
	$base=mysqli_select_db($connect,$bdd);
	if (isset($_POST['T_Conditionnement'])){
	
	$id_Conditionnement=rand(1000,9999);
	$T_Conditionnement=$_POST['T_Conditionnement'];
	$Li_Conditionnement=$_POST['Li_Conditionnement'];
	$Poids_Conditionnement=$_POST['Poids_Commande'];
	
	$requete = "INSERT INTO conditionnement(id_conditionnement,type_conditionnement,libelle_conditionnement,poids_conditionnement) VALUES ('$id_Conditionnement','$T_Conditionnement','$Li_Conditionnement','$Poids_Conditionnement')";
	mysqli_query ($connect,$requete);
	
	if($requete == true){
		echo "Données insérees";
	}else
	{
		echo "Données non insérées";
	}
	
	}	
	mysqli_close($connect);

?>