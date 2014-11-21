<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>AGRUR - Mes informations</title>
		<?php 
			include('head.html');
			//require_once('connexion_BDD.php');

		?>

		<link rel="stylesheet" type="text/css" src="css/commun.css">
		<link rel="stylesheet" type="text/css" src="css/general.css">
	</head>

	<body>
		<?php
			try
			{
				if(isset($_SESSION['connecte']))
				{

				}
				else
				{
					throw new Exception('connexion');
				}
			}
			catch(Exception $e)
			{
				header('Location: connexion.php?err='.$e.getMessage());
			}