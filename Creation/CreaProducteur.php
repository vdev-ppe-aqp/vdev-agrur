<html>
	<head>
		<meta charset='UTF-8'>
	</head>
	<body>
	<center><h2>Insertion de données dans la table producteur </h2></center>
		<form method=POST action="CreaProducteur.php">
			<label>Nom du Producteur : </label><input type='textbox' name='N_Producteur'>
			<label>Prénom du Producteur : </label><input type='textbox' name='P_Producteur'>
			<label>Adresse du Producteur : </label><input type='textbox' name='Adr_Producteur'>
			<label>Nom de la Société : </label><input type='textbox' name='So_Producteur'>
			<input type='submit' id='button2' text='Insérer'>
		</form>
		<br><br>
		<a href="MenuCrea.php">Menu</a>
	</body>
</html>
<?php
	$connect=mysqli_connect("localhost","root","");
	$bdd="agrur";
	
	$base=mysqli_select_db($connect,$bdd);
	if (isset($_POST['N_Producteur'])){
	
	$Num_Producteur=rand(1000,9999);
	$N_Producteur=$_POST['N_Producteur'];
	$P_Producteur=$_POST['P_Producteur'];
	$Adr_Producteur=$_POST['Adr_Producteur'];
	$So_Producteur=$_POST['So_Producteur'];
	/*$Date_Adhesion=date();*/
	
	$requete = "INSERT INTO producteur(num_producteur,nom_producteur,prenom_producteur,adresse_producteur) VALUES ('$Num_Producteur','$N_Producteur','$P_Producteur','$Adr_Producteur')";
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