<?php
	
	/**
	 * Adresse du serveur où se trouve la base de données
	 * Si le serveur est en local les valeurs 'localhost' & '127.0.0.1'
	 * sont à saisir. Si la base de données est stockée sur un serveur
	 * distant, il faut saisir l'adresse ip du serveur. 
	 * Par exemple si la base de données se trouve sur le serveur possèdant
	 * l'adresse ip '172.63.100.12' 
	 * $bdd_server = '127.63.100.12'
	**/
	$bdd_serveur = 'localhost';

	/**
	 * Nom de l'utilisateur qui se connectera à la base de données
	 * Vous pouvez changer ce nom d'utilisateur, mais nous vous 
	 * recommandons de ne pas le faire. Si vous changez d'utilisateur
	 * vérifiez qu'il ne possède pas des droits importants qui pourraient
	 * endommagé la base de données. Seul les droits SELECT, INSERT, UPDATE
	 * et DELETE devraient être attribués à cet utilisateur.
	 **/
	$bdd_utilisateur = 'root'; //Droits : SELECT , UPDATE , INSERT , DELETE 


	/**
	 * Mot de passe du profil qui se connectera à la base de données
	 * Si l'utilisateur sélectionné ne possède pas de mot de passe,
	 * laissez ce champ vide. Pour des raisons de sécurité, nous vous
	 * recommandons d'utiliser des profils utilisateurs MySQL possédant
	 * un mot de passe de plus de 10 caractères, mélangeants caractères
	 * majusucules, minuscules et numériques.
	**/
	$bdd_motdepasse = '';//'4QeP74Sd8vnefutx';


	/**
	 * Répertoire dans lequel se trouve l'application
	 * Par exemple si l'application se situe dans le 
	 * répertoire vdev-agrur alors 
	 * $repertory = 'vdev-agrur';
	 * Ce qui donnera comme chemin : 
	 * /vdev-agrur/login.php
	**/
	$repertoire = 'vdev-agrur';