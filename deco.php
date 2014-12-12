<?php
session_start();

//'Détruis' la session active
if(isset($_SESSION))
{
	session_destroy();
	echo('Deconnexion reussie !');
	header('Location: authentifier.php');
}
?>