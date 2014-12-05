<html>
	<head>
		<meta charset='UTF-8'>
	</head>
	<body>
	<center><h2>Insertion de données dans la table producteur </h2></center>
		<form method=POST action="Creavergers.php">
			<label>Nom du Verger : </label><input type='textbox' name='N_Verger'>
			<label>Superficie du Verger : </label><input type='textbox' name='Su_Verger'>
			<label>Nombre d'arbre : </label><input type='number' name='NbArbre_Verger'>
			<input type='submit' id='button2' text='Insérer'>
		</form>
		<a href="MenuCrea.php">Menu</a>
	</body>
</html>
<?php
	
	$connect=mysqli_connect("localhost","root","");
	$bdd="agrur";
	
	$base=mysqli_select_db($connect,$bdd);
	if (isset($_POST['N_Verger'])){
	
	$Id_verger=rand(1000,9999);
	$N_verger=$_POST['N_Verger'];
	$Su_verger=$_POST['Su_Verger'];
	$NbArbre_verger=$_POST['NbArbre_Verger'];
	
	$requete = "INSERT INTO Verger(id_verger,nom_verger,superficie_verger,nbarbre_verger)VALUES ('$Id_verger','$N_verger','$Su_verger','$NbArbre_verger')";
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