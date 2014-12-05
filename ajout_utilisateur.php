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


<!DOCTYPE html>
<html>
    <head> 
        <?php include('head.html');?>

        <link rel="stylesheet" type="text/css" href="css/communs.css">
        <link rel="stylesheet" type="text/css" href="css/general.css">
    </head>

    <body>
        <header>
            <?php include('header.php'); ?>
        </header>

        <div class="formulaire">
                <h3>Inscription</h3>

                <?php
                    if(isset($message))
                    {
                        echo($message);
                    }
                ?>

                <p>Veuillez remplir le formulaire suivant pour créer un compte</p>

                <form method="POST" action="ajout_utilisateur.php">
                    <label for="txt_nom"></label>
                    <input type="text" name="txt_nom" id="form_txt" placeholder="Nom" required="required"><br />
                    <label for="txt_mail"></label>
                    <input type="mail" name="txt_mail" id="form_txt" placeholder="Adresse m@il" required="required"><br/>
                    <label for="pw_mdp"></label>
                    <input type="password" name="pw_mdp" id="form_txt" placeholder="Mot de passe" required="required"><br />
                    <label for="pw_mdp"></label>
                    <input type="password" name="pw_mdp" id="form_txt" placeholder="Confirmer mot de passe" required="required"><br />
                    <label for="ls_type_compte"></label>
                    <select name="ls_type_compte">
                        <option value="producteur">Producteur</option>
                        <option value="client">Client</option>
                    </select><br />

                    <input type="SUBMIT" name="btn_validation" id="btn_validation" value="Connexion">
                </form>




