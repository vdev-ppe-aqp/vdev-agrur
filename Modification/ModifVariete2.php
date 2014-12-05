<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST">
		<label>Libelle de la Variete</label><input type="textbox" id="libelle_Variete">
		<label>AOC</label><input type="radio" id="Oui_Non" value="Oui"> <label>Oui</label>
		<input type="radio" id="Oui_Non" value="Non"><label>Non</label>
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Libelle_Variete=$_POST["libelle_Variete"];
$Oui_Non_Variete=$_POST["Oui_Non"];



$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "INSERT  INTO $Variete (libelle_Variete, oui_non)
            VALUES ( "$Libelle_Variete", "$Oui_Non_Variete") " ;
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