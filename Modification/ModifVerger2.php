<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form action="POST">
		<label>Libelle du Verger</label><input type="textbox" id="libelle_Verger">
		<label>Superficie du Verger</label><input type="textbox" id="superficie_Verger">
		<label>Nombre d'arbre</label><input type="textbox" id="nb_arbre_Verger">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>
<?php
$Nom_Verger=$_POST["libelle_Verger"];
$Superficie_Verger=$_POST["superficie_Verger"];
$Nb_Arbre_Verger=$_POST["nb_arbre_Verger"];



$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd);

$sql = "INSERT  INTO $Verger (libelle_verger, superficie_verger, nb_arbre_verger)
            VALUES ( "$Libelle_Verger", "$Superficie_Verger", "$Nb_Arbre_Verger") " ;
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