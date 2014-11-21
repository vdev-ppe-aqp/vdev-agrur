<?php

if(isset($_POST['afficher']) && $_POST['afficher'] == "Afficher"){

	require_once('../connexion_BDD.php');
	$requetePrepa = $connexion->prepare("SELECT * FROM conditionnement");
	
	try{
		$requetePrepa->execute();
		while($row = $requetePrepa->fetch(PDO::FETCH_ASSOC)) {
  			echo 'Nom: '. $row['libelle_conditionnement'] .'  Poids: '. $row['poids_conditionnement'] .'<br/>';
		}
		$requetePrepa->closeCursor();
	}catch(Exception $e){
		echo 'Erreur de requête ' , $e->getMessage();
	}
}

?>