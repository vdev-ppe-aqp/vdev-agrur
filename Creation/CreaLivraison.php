<html>
	<head>
		<meta charset='UTF-8'>
	</head>
	<body>
	<center><h2>Insertion de données dans la table</h2></center>
		<form method=POST action="CreaLivraison.php">
			<label>Date de livraison : </label><input type='date' name='Date_Livraison'>
			<label>Type de livraison : </label><input type='textbox' name='T_Livraison'>
			<label>Quantité : </label><input type='textbox' name='Qt_Livraison'>
			<label>Nom du Client : </label><input type='textbox' name='Cli_Livraison'>
			<input type='submit' id='button2' text='Insérer'>
		</form>
		<a href="MenuCrea.php">Menu</a>
	</body>
</html>
<?php
	$connect=mysqli_connect("localhost","root","");
	$bdd="agrur";
	
	$base=mysqli_select_db($connect,$bdd);
	if (isset($_POST['T_Livraison'])){
	
	$id_Livraison=rand(1000,9999);
	$Date_Livraison=$_POST['Date_Livraison'];
	$Type_Livraison=$_POST['T_Livraison'];
	$Qt_Livraison=$_POST['T_Livraison'];
	$Cli_Livraison=$_POST['Cli_Livraison'];
	
	$requete = "INSERT INTO livraison(id_livraison,date_livraison,type_livraison,qt_livraison,cli_livraison) VALUES ('$id_Livraison','$Date_Livraison','$Type_Livraison','Qt_Livraison','$Cli_Livraison')";
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