<?php

	if (isset($_POST['modifier']) && $_POST['modifier'] == 'Modfier') {

		require_once('../connexion_BDD.php');
		//prepare la requete global 
		$requetePrepa = $connexion->prepare('UPDATE utilisateur SET ?=?');
		// on verifie si le champ mail est rempli
		if ((isset($_POST['txt_mail']) && !empty($_POST['txt_mail']))){
			//verifie si le mail est correct
			if(verif_mail($_POST['txt_mail'])){
				//execute la requete
				$requetePrepa = $connexion->execute(array('mail' , $_POST['txt_mail']));

				if($sucess){
					echo 'Le mail a bien été modifié' ;

					header("refresh:4 ;url=../formTest.php");
				}else {
					echo 'Erreur lors de la modfication du mail';

					header("refresh:4 ;url=../formTest.php");
				}
			
			}

		}
		// on verifie si le champ mdp et mdp confirmer sont rempli
		elseif ( isset($_POST['pw_mdp']) && !empty($_POST['pw_mdp']) && isset($_POST['pw_confirmeMdp']) && !empty($_POST['pw_confirmeMdp'])) {
			// verifie si les 2mdp sont sous le bon format
			if(verif_mdp($_POST['pw_mdp']) && verif_mdp($_POST['pw_confirmeMdp'])){
				//verifie si les 2mdp sont identiques
				if($_POST['pw_mdp'] === $_POST['pw_confirmeMdp']){

					$mdp = $_POST['pw_mdp'];
					//execute la requete
					$requetePrepa = $connexion->execute(array('mdp' , $mdp ));

					if($sucess){
						echo 'Le mot de passe a bien été modifié' ;

						header("refresh:3 ;url=../formTest.php");
					}else {
						echo 'Erreur lors de la modification du mot de passe';

						header("refresh:3 ;url=../formTest.php");
					}
				}		
			}
		}
		// on verifie si le champ adresse est rempli
		elseif ( isset($_POST['txt_adresse']) && !empty($_POST['txt_adresse'])){
			//execute la requete
			$requetePrepa = $connexion->execute(array('adresse' , $_POST['txt_adresse']));

			if($sucess){
				echo 'L\'adresse a bien été modifié' ;
				header("refresh:3 ;url=../formTest.php");
			}else {
				echo 'Erreur lors de la modification de l\'adresse';
				header("refresh:3 ;url=../formTest.php");
			}		
		}
	}

	function verif_mail($mail){
		if (preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9]{2,}\.[a-z]{2,4}$#", $_POST['txt_mail'])){
			return true ;
		}
		else{
			return false ;
		}
	}
	function verif_mdp($mdp){
		if (preg_match("#^[a-zA-Z0-9]{8,}$#", $_POST['pw_mdp'])){
			return true ;
		}
		else{
			return false ;
		}
	}
?>