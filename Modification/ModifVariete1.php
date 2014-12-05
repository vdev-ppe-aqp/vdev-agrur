<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST" submit="ModifVariete2.php">
		<label>Id du Variete</label><input type="textbox" id="id_Variete">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Id_Variete=$_POST["id_Variete"];

$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "SELECT "$Id_Variete" FROM Variete; " ;
	$requete = mysql_query($sql,$bdd) or die( mysql_error() ) ;
	if($requete)
  {
    echo("Id Variete trouvé") ;
	include("ModifVariete2.php");
  }
  else
  {
    echo("Id Variete non trouvé") ;
  }
	//Requête fini
	mysqli_close();
?>