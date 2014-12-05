    <?php
    // on se connecte à notre base
    $base = mysqli_connect ('root', '', '');
    mysqli_select_db ('AGRUR', $base) ;
    ?>
    <html>
    <head>
    <title>Affichage de vergers</title>
    </head>
    <body>
    <?php 
    $sql = 'SELECT * FROM Verger';
    $req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    while ($data = mysqli_fetch_array($req)) {
	
    // on affiche les résultats
    echo 'Nom du Verger : '.$data['nom_verger'].'<br />';
    echo 'Superficie du Verger : '.$data['superficie_verger'].'<br /><br />';
	echo 'Nombre arbre : '.$data['nombre_arbre_verger'].'<br /><br />';
    }
    mysqli_free_result ($req);
    mysqli_close ();
    ?>
    </body>
    </html>