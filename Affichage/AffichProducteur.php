    <?php
    // on se connecte à notre base
    $base = mysqli_connect ('root', '', '');
    mysqli_select_db ('AGRUR', $base) ;
    ?>
    <html>
    <head>
    <title>Affichage de Producteur</title>
    </head>
    <body>
    <?php 
    $sql = 'SELECT * FROM Producteur';
    $req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    while ($data = mysqli_fetch_array($req)) {
	
    // on affiche les résultats
    echo 'Nom : '.$data['nom_producteur'].'<br />';
    echo 'Prénom : '.$data['prenom_producteur'].'<br /><br />';
	echo 'Adresse : '.$data['adresse_producteur'].'<br /><br />';
	echo 'Nom du Producteur : '.$data['nom_societe_producteur'].'<br /><br />';
    }
    mysqli_free_result ($req);
    mysqli_close ();
    ?>
    </body>
    </html>