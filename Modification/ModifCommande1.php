<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form method="POST" action="ModifCommande2.php">
		<label>Id du Commande</label><input type="textbox" id="id_Commande">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$IdCommande=0
if(isset($_POST['id_Commande'])){
	$Id_Commande=$_POST['id_Commande'];
}

$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd,"Agrur");

$sql = "SELECT $Id_Commande FROM Commande; " ;
	$requete = mysql_query($bdd,$sql) or die( mysql_error() ) ;
	if(mysqli_num_rows($requete)==0)
  {
    echo("Id Commande non trouvé") ;
	
  }
  else
  {
    echo("Id Commande non trouvé") ;
	include("ModifCommande2.php");
  }
	//Requête fini
	mysqli_close();
	
?>