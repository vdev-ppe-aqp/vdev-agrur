<!DOCTYPE html>
<html>
	<head>
		<title>Page de test</title>
		<meta charset="utf-8">
	</head>

	<body>
		<?php
			$con = mysqli_connect('localhost', 'Gestionnaire', '4QeP74Sd8vnefutx', 'agrur');
			$sql = ('SELECT * FROM utilisateur');
			$requete = mysqli_query($con, $sql);
			while($ligne = mysqli_fetch_array($requete))
			{
				echo($ligne['nom_client']);
			}
			

		?>
	</body>
</html>