<html>
	<head>
	<meta charset="UTF-8">
	<title>Modification</title>
	</head>
		<body>
		<form method="POST" action="">
		<label>Nom du Client</label><input type="textbox" id="nom_client">
		<label>Adresse du Client</label><input type="textbox" id="adr_client">
		<label>Nom du responsable du Client</label><input type="textbox" id="nomres_client">
		<input type="submit" name="Envoyer">
		</form>
		</body>
</html>

<?php
$Nom_Client="";
$Adr_Client="";
$Nomres_Client="";

if (isset($_POST['nom_client'])){
	$Nom_Client=$_POST['nom_client'];
}
if (isset($_POST['nom_client'])){
	$Adr_Client=$_POST['adr_client'];
}
if (isset($_POST['nom_client'])){
	$Nomres_Client=$_POST['nomres_client'];
}

$bdd = mysqli_connect('localhost','root','');
mysqli_select_db($bdd,"Agrur");


$sql = 'INSERT  INTO $Client (nom, adresse, nomres)
            VALUES ($Nom_Client, $Adr_Client, $Nomres_Client);' ;
	$requete1 = mysqli_query($bdd,$sql) or die( mysql_error() ) ;
	if(mysql_num_rows($requete1)==0)
  {
    echo("Requête non réussi") ;
  }
  else
  {
    echo("Requête réussi") ;
  }
	//Requête fini
	mysqli_close();

?>