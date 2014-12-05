    <?php
    // on se connecte à notre base
    $base = mysqli_connect ('root', '', '');
    mysqli_select_db ('AGRUR', $base) ;
    ?>
    <html>
    <head>
    <title>Affichage de clients</title>
    </head>
    <body>
    <?php 
    $sql = 'SELECT * FROM Client';
    $req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    while ($data = mysqli_fetch_array($req)) {
	
    // on affiche les résultats
    echo 'Nom : '.$data['nom_client'].'<br />';
    echo 'Prénom : '.$data['prenom_client'].'<br /><br />';
	echo 'Adresse : '.$data['adresse_client'].'<br /><br />';
	echo 'Nom responsable : '.$data['responsable_client'].'<br /><br />';
    }
    mysqli_free_result ($req);
    mysqli_close ();
    ?>
    </body>
    </html>