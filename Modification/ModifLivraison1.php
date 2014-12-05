<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST" submit="ModifLivraison2.php">
		<label>Id du Livraison</label><input type="textbox" id="id_Livraison">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Id_Livraison=$_POST["id_Livraison"];

$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "SELECT "$Id_Livraison" FROM Livraison; " ;
	$requete = mysql_query($sql,$bdd) or die( mysql_error() ) ;
	if($requete)
  {
    echo("Id Livraison trouvé") ;
	include("ModifLivraison2.php");
  }
  else
  {
    echo("Id Livraison non trouvé") ;
  }
	//Requête fini
	mysqli_close();
?>