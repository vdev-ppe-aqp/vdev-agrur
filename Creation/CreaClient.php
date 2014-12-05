<html>
	<head>
		<meta charset 'UTF-8'>
	</head>
	<body>
	<center><h2>Insertion de données dans la table client</h2></center>
		<form method=POST action="CreaClient.php">
			<label>Nom du Client : </label><input type='text' name='N_Client'></input>
			<label>Prénom du Client : </label><input type='text' name='P_Client'></input>
			<label>Adresse du Client : </label><input type='text' name='Adr_Client'></input>
			<label>Responsable du Client : </label><input type='text' name='Res_Client'></input>
			<input type='submit' id='button1' text='Inserer'></input>
		</form>
		<a href="MenuCrea.php">Menu</a>
	</body>
</html>
<?php
	
	$connect=mysqli_connect("localhost","root","");
	$bdd="agrur";
	
	$base=mysqli_select_db($connect,$bdd);
	if (isset($_POST['N_Client'])){

	$Num_Client=rand(1000,9999);
	$N_Client=$_POST['N_Client'];
	$P_Client=$_POST['P_Client'];
	$Adr_Client=$_POST['Adr_Client'];
	$Res_Client=$_POST['Res_Client'];
	
	$requete = "INSERT INTO client (num_client,nom_client,prenom_client,adresse_client,responsable_Client) VALUES ('$Num_Client','$N_Client','$P_Client','$Adr_Client','$Res_Client')";
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