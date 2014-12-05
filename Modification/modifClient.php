<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>AGRUR - Modifier mes informations client</title>
		<?php include('head.html'); ?>
	</head>
		
	<body>
		<form method="POST" action="ModifClient2.php">
			<label>Id du Client</label><input type="textbox" id="id_client">
			<input type="submit" name="Envoyer">
		</form>
	</body>
</html>



<?php
$Id_Client="";
if (isset($_POST['id_client'])){
	$Id_Client=$_POST['id_client'];
}
$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd,"Agrur");

$sql ="SELECT $Id_Client FROM Client;" ;
	$requete = mysqli_query($bdd,$sql) or die( mysql_error() ) ;
	if(mysql_num_rows($requete)==0)
  {
    echo("Id Client non trouvé") ;
  }
  else
  {
    echo("Id Client trouvé") ;
	include("ModifClient2.php");
  }
	//Requête fini
	mysqli_close();
?>



