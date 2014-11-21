<?php
	// Connexion au serveur
		//prepare les configs
		$dns ='mysql:host=127.0.0.1:3307;dbname=agrur';
		$utilisateur ='Gestionnaire';	//Droit : SELECT , UPDATE , INSERT , DELETE 
		$motDePasse ='4QeP74Sd8vnefutx';
		// Options de connexion
		//1er option : encodage en utf8
		//2eme option :"Active" les exceptions 
		$options = array(PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8",PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	try {	
		$connexion = new PDO($dns,$utilisateur,$motDePasse,$options);	
	} 
	catch ( Exception $e ) {
		echo "Connexion a MySQL impossible : ", $e->getMessage();
		die();
	}
?>