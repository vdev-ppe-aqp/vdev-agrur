<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST">
		<label>Date de commande</label><input type="textbox" id="date_Commande">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Date_Commande=$_POST["date_Commande"];


$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "INSERT  INTO $Commande (date_commande)
            VALUES ( "$Date_Commande") " ;
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