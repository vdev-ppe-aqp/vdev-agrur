<meta charset="utf8">
<?php

	// on teste si le visiteur a soumis le formulaire de connexion
	if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
		//on teste si le visiteur a rempli le formulaire
		if ((isset($_POST['txt_mail']) && !empty($_POST['txt_mail'])) && (isset($_POST['pw_mdp']) && !empty($_POST['pw_mdp']))) {
			
			require_once('../connexion_BDD.php');
			try{
				// on teste si une entrée de la base contient ce couple login / pass
				//prepare la requete
				$requetePrepa = $connexion->prepare('SELECT count(*) AS num FROM utilisateur WHERE mail=:mail AND mdp=:mdp');
				$requetePrepa->bindParam(':mail', $_POST['txt_mail']);
				$requetePrepa->bindParam(':mdp', $_POST['pw_mdp']);
				//execute la requete
				$requetePrepa->execute();
			}catch (Exception $e){
				echo 'Erreur de requète : ', $e->getMessage();
                header("refresh:3 ;url= ../formTest.php");
			}
			//recupere le nombre de colonne
			$num=$requetePrepa->fetchColumn();
			//ferme le cursor
			$requetePrepa->closeCursor();
			// si on obtient une réponse, alors l'utilisateur est un membre
			if ( $num == 1) {
				try{
					//prepare la requete
					$req = $connexion->prepare('SELECT nom FROM utilisateur WHERE mail=:mail AND mdp=:mdp');
					$req->bindParam(':mail', $_POST['txt_mail']);
					$req->bindParam(':mdp', $_POST['pw_mdp']);

					//execute la requete
					$req->execute();
					//recuperation des données
					$req->setFetchMode(PDO::FETCH_ASSOC);
					$enregistrement = $req->fetch();
					//ferme le cursor
					$req->closeCursor();

				}catch(Exception $e){
					echo 'Erreur de requète : ', $e->getMessage();
               		header("refresh:5 ;url= ../formTest.php");
				}
			
				session_start();
				$_SESSION['login'] = $enregistrement['nom'];
				header("Location: ../formTest.php");
			}
			// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
			elseif ($num == 0) {
				echo 'Compte non reconnu.';
				header("refresh:3 ;url=../formTest.php");
			}
			// sinon, alors la, il y a un gros problème :)
			else {
				echo 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
				header("refresh:3 ;url=../formTest.php");
			}
		}
	}else {
		echo 'Au moins un des champs est vide.';
		header("refresh:3 ;url=../formTest.php");
	}
?>
