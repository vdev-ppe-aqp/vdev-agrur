<html>
	<head>
		<meta charset='UTF-8'>
	</head>
	<body>
	<center><h2>Insertion de donnees dans la table producteur </h2></center>
		<form method=POST action="CreaCommande.php">
			<label>Date de commande: YEAR-MT-DA : </label><input type="textbox" name="date_Commande">
			<input type='submit' id='button2' text='Insérer'>
		</form>
		<a href="MenuCrea.php">Menu</a>
	</body>
</html>
<?php
	
	$connect=mysqli_connect("localhost","root","");
	$bdd="agrur";
	
	$base=mysqli_select_db($connect,$bdd);
	if (isset($_POST['date_Commande'])){
	
	$id_Commande=rand(1000,9999);
	$Date_Commande=$_POST['date_Commande'];
	
	$requete = "INSERT INTO Commande(id_commande,date_commande) VALUES ('$id_Commande','$Date_Commande')";
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