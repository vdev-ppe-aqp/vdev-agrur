<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST" submit="ModifVerger2.php">
		<label>Id du Verger</label><input type="textbox" id="id_Verger">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Id_Verger=$_POST["id_Verger"];

$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "SELECT "$Id_Verger" FROM Verger; " ;
	$requete = mysql_query($sql,$bdd) or die( mysql_error() ) ;
	if($requete)
  {
    echo("Id Verger trouvé") ;
	include("ModifVerger2.php");
  }
  else
  {
    echo("Id Verger non trouvé") ;
  }
	//Requête fini
	mysqli_close();
?>