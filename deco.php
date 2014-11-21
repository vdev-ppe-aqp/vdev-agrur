<?php
session_start();
if(isset($_POST['deco']) && $_POST['deco'] == "Deco"){

	unset($_SESSION['login']);
	header("Location:../formTest.php");
}
?>