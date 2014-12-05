<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST" submit="ModifCommune2.php">
		<label>Id du Commune</label><input type="textbox" id="id_Commune">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Id_Commune=$_POST["id_Commune"];

$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "SELECT "$Id_Commune" FROM Commune; " ;
	$requete = mysql_query($sql,$bdd) or die( mysql_error() ) ;
	if($requete)
  {
    echo("Id Commune trouvé") ;
	include("ModifCommune2.php");
  }
  else
  {
    echo("Id Commune non trouvé") ;
  }
	//Requête fini
	mysqli_close();
?>