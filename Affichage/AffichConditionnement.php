    <?php
    // on se connecte à notre base
    $base = mysqli_connect ('root', '', '');
    mysqli_select_db ('AGRUR', $base) ;
    ?>
    <html>
    <head>
    <title>Affichage de Conditionnement</title>
    </head>
    <body>
    <?php 
    $sql = 'SELECT * FROM Conditionnement';
    $req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    while ($data = mysqli_fetch_array($req)) {
	
    // on affiche les résultats
    echo 'Numéro de conditionnement : '.$data['numero_conditionnement'].'<br />';
    }
    mysqli_free_result ($req);
    mysqli_close ();
    ?>
    </body>
    </html>