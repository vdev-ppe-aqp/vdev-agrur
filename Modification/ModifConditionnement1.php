<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST" submit="ModifConditionnement2.php">
		<label>Id du Conditionnement</label><input type="textbox" id="id_Conditionnement">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Id_Conditionnement=$_POST["id_Conditionnement"];

$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "SELECT "$Id_Conditionnement" FROM Conditionnement; " ;
	$requete = mysql_query($sql,$bdd) or die( mysql_error() ) ;
	if($requete)
  {
    echo("Id Conditionnement trouvé") ;
	include("ModifConditionnement2.php");
  }
  else
  {
    echo("Id Conditionnement non trouvé") ;
  }
	//Requête fini
	mysqli_close();
?>