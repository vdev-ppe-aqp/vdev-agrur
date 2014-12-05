<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST" submit="ModifProducteur2.php">
		<label>Id du Producteur</label><input type="textbox" id="id_Producteur">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Id_Producteur=$_POST["id_Producteur"];

$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "SELECT "$Id_Producteur" FROM Producteur; " ;
	$requete = mysql_query($sql,$bdd) or die( mysql_error() ) ;
	if($requete)
  {
    echo("Id Producteur trouvé") ;
	include("ModifProducteur2.php");
  }
  else
  {
    echo("Id Producteur non trouvé") ;
  }
	//Requête fini
	mysqli_close();
?>