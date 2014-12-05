<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST">
		<label>Nom de la Commune</label><input type="textbox" id="nom_Commune">
		<label>AOC</label><input type="radio" id="Oui_Non" value="Oui"> <label>Oui</label>
		<input type="radio" id="Oui_Non" value="Non"><label>Non</label>
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Nom_Commune=$_POST["nom_Commune"];
$Oui_Non_Commune=$_POST["Oui_Non"];



$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "INSERT  INTO $Commune (nom_Commune, oui_non)
            VALUES ( "$Nom_Commune", "$Oui_Non_Commune") " ;
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