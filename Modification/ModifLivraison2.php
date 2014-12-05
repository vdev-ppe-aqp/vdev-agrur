<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST">
		<label>Date de Livraison</label><input type="textbox" id="date_Livraison">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Date_Livraison=$_POST["date_Livraison"];


$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "INSERT  INTO $Livraison (date_Livraison)
            VALUES ( "$Date_Livraison") " ;
	$requete = mysql_query($sql,$bdd) or die( mysql_error() ) ;
	if($requete)
  {
    echo("Requête réussi") ;
  }
  else
  {
    echo("Requête non réussi") ;
  }
	//Requête fini
	mysqli_close();

?>