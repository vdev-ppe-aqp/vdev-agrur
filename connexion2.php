<html>
<meta charset="utf-8"></meta>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
</html>


  <!-- Tableau qui contient le formulaire -->
 <div class="panel panel-primary">
            <div class="panel-heading">
			<!-- Titre dans la partie bleur du tableau -->
            <h3 class="panel-title">Connexion </h3>
            </div>
			

<?php
session_start();
?>
<html>
<head>
<title>Connexion</title>
</head>
<body>
<?php

if (isset($_POST['txt_login']) &&  $_POST['txt_mdp'])
   if (isset($_POST['txt_mdp']))
$pseudo = $_POST['txt_login'] ;
$motdepasse = $_POST['txt_mdp'] ;

$base = mysqli_connect("localhost", "root", "","utmb"); //Base de données modifiéee
	
if(!empty($pseudo)){
	if(!empty($motdepasse)){
		$sql=("SELECT login, mdp FROM benevole WHERE login ='$pseudo' and mdp='$motdepasse'");
		$resultat =mysqli_query($base,$sql);
		$data = mysqli_fetch_array($resultat);
		if( $data['login']== $pseudo && $data['mdp']==$motdepasse){
		header("Location: index.php");
		}
		else{
		echo "Mauvaise combinaison login / mot de passe" ;
		}
	}
	else{
		echo "Mot de passe incorrect" ;
	}
}
else{
	echo "Login Incorrect" ;
}
?>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Connexion</title>
		<meta charset="utf-8">

		<link rel="stylesheet" href="css/general.css" type="text/css">
		<link rel="stylesheet" href="css/objets.css" type="text/css">
	</head>

	<body>
		<header>
			
		</header>

		<nav>
			<?php //include('menu.php'); ?>
		</nav>

		<section class="centre" style="text-align:center;">
			<h3>Connexion</h3>
			<?php
				if(isset($message))
				{
					echo('<span id="msg_err">'.$message.'</span>');
				}
			?>
			<p>
				Pour continuer, veuillez vous connecter.
			</p>

			<hr>

			<form method="POST" action="connexion2.php">
				<table style="margin-left:auto; margin-right:auto;">
					<tr>
						<td><label for="txt_login">Login :</label></td>
						<td><input type="text" name="txt_login" id="form_txt" placeholder="Identifiant"></td>
					</tr>
					<tr>
						<td><label for="txt_mdp">Mot de passe :</label></td>
						<td><input type="password" name="txt_mdp" id="form_txt" placeholder="Mot de passe"></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><input type="submit" name="btn_ok" id="form_btn" size="100" value="Valider"></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						<td><a href="inscription.php">Créer un compte</a></td>
					</tr>
					<tr>
						<td><!--vide--></td>
						
					</tr>
				</table>
			</form>
		</section>
	</body>
</html>