<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST">
		<label>Quantité</label><input type="textbox" id="quantite_Conditionnement">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php

$Quantite_Conditionnement=$_POST["quantite_Conditionnement"];


$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "INSERT  INTO $Conditionnement (quantite_Conditionnement)
            VALUES ( "$Quantite_Conditionnement") " ;
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