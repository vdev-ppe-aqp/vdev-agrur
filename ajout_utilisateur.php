<?php
    //On verifie si l'utilisateur a valider son inscription
    if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
        //On verifie si tout les champs du formulaire sont remplie
        if(isset($_POST['txt_nom']) && isset($_POST['txt_mail']) && isset($_POST['pw_mdp'])){
            //prepare la requete
            require_once('../connexion_BDD.php');
            $insert = $connexion->prepare('INSERT INTO utilisateur(nom ,mail ,mdp) VALUES(NULL, :nom,:mail, :mdp)');
        
            // On rempli les paramètres
            $insert->bindParam(':nom', $_POST['txt_nom'], PDO::PARAM_STR, 100);
            $insert->bindParam(':mail', $_POST['txt_mail'], PDO::PARAM_STR, 100);
			$insert->bindParam(':mdp', $_POST['pw_mdp'], PDO::PARAM_STR, 50); 

			try {
                // On exécute
                $sucess =$insert->execute();
 
                if( $success ) {
                    echo "Enregistrement réussi";

                    header("refresh:5 ;url=../formTest.php");
                } 
            } catch( Exception $e ){
                echo 'Erreur de requète : ', $e->getMessage();

                header("refresh:5 ;url=../formTest.php");
            }

            $connexion->closeCursor();
        }
    }
?>
