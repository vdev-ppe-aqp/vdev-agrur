<?php

session_start();

require_once('../connexion_BDD.php');


	//on verifie si session['login'] est set
	if (isset($_SESSION['login'])){
		//prepare la requete
		$requetePrepa = $connexion->prepare("SELECT * FROM client WHERE nom_client = :nom");
		$requetePrepa->bindParam(':nom', $_SESSION['login']);
	
		try{
			//execute la requete
			$requetePrepa->execute();

			//recupere les données
			$row = $requetePrepa->fetch(PDO::FETCH_ASSOC);

			//affichage des données de l'utilisateur
			echo 'Nom: '. $row['nom_client'].'<br/>';
			echo 'Adresse: '. $row['adresse_client'].'<br/>';
			echo 'Nom responsable: '. $row['nom_responsable_achat'].'<br/>';

			//ferme le cursor
			$requetePrepa->closeCursor();
		}catch(Exception $e){
			echo 'Erreur de requête ' , $e->getMessage();
		}	
	//sinon personne n'est co	
	}else{
		echo 'Personne n\'est connecté';
	}


?>