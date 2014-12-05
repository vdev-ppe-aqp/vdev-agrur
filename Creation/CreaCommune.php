<html>
	<head>
		<meta charset='UTF-8'>
	</head>
	<body>
	<center><h2>Insertion de données dans la table </h2></center>
		<form method=POST action="CreaCommune.php">
			<label>Nom de la commune : </label><input type='textbox' name='Nom_Commune'>
			<br>
			<label>Commune AOC : </label><br>
			<label>Oui</label><input type='radio' name='AOC' value='Oui'>
			<label>Non</label><input type='radio' name='AOC' value='Non' > 
			<input type='submit' id='button2' text='Insérer'>
		</form>
		<a href="MenuCrea.php">Menu</a>
	</body>
</html>
<?php

	$connect=mysqli_connect("localhost","root","");
	$bdd="agrur";
	
	$base=mysqli_select_db($connect,$bdd);
	if (isset($_POST['Nom_Commune'])){
	
	$id_Commune=rand(1000,9999);
	$Nom_Commune=$_POST['Nom_Commune'];
	$AOC=$_POST['AOC'];
	
	$requete = "INSERT INTO Commune (id_commune,nom_commune,commune_aoc) VALUES ('$id_Commune','$Nom_Commune','$AOC')";
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