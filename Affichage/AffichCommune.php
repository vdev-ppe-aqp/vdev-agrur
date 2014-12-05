    <?php
    // on se connecte à notre base
    $base = mysqli_connect ('root', '', '');
    mysqli_select_db ('AGRUR', $base) ;
    ?>
    <html>
    <head>
    <title>Affichage de Commune</title>
    </head>
    <body>
    <?php 
    $sql = 'SELECT * FROM Commune';
    $req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    while ($data = mysqli_fetch_array($req)) {
	
    // on affiche les résultats
    echo 'Nom de la commune : '.$data['nom_commune'].'<br />';
    echo 'Aoc : '.$data['aoc_commune'].'<br /><br />';

    }
    mysqli_free_result ($req);
    mysqli_close ();
    ?>
    </body>
    </html>