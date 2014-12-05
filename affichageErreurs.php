<?php 
	session_start();

	//Vérifie que la variable $_GET est initialisée
	if(isset($_GET['msg']))
	{
		switch($_GET['msg'])
		{
			case 1:
				$message = ('<span id="msg_err">Erreur lié à la base de données</span>');
			break;
			case 2:
				$message = ('<span id="msg_err">Au moins un des champs est vide</span>');
			break;
			case 3:
				$message = ('<span id="msg_err">Au moins un des champs ne respecte pas les critères</span>');
			break;
			case 4:
				$message = ('<span id="msg_suc">Informations enregistrées !</span>');
			break;
			default:
			break;
		}
	}
?>