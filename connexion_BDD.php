<?php
	/**
	 * Connexion à la base de données
	 * @var $bdd_serveur - Correspond à l'adresse du serveur où se trouve la base. Contenue dans le fichier agrur_config.php
	 * @var $bdd_utilisateur - Correspond à l'utilisateur avec lequel on sera connecté à la base de données. Contenue dans le fichier agrur_config.php
	 * @var $bdd_motdepasse - Correspond au mot de passe de l'utilisateur précédemment sélectionné. Contenue dans le fichier agrur_config.php
	**/
	
	//Importation du fichier de configuration
	include('agrur_config.php');

	//Prépare les configurations
	$dns ='mysql:host='.$bdd_serveur.';dbname=agrur';
	
	// Options de connexion
	//1er option : encodage en utf8
	//2eme option :"Active" les exceptions 
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8",PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try 
	{	
		$connexion = new PDO($dns,$bdd_utilisateur,$bdd_motdepasse,$options);	
	} 
	catch ( Exception $e ) 
	{
		echo "Connexion a MySQL impossible : ", $e->getMessage();
		die();
	}
?>