    <?php
    // on se connecte à notre base
    $base = mysqli_connect ('root', '', '');
    mysqli_select_db ('AGRUR', $base) ;
    ?>
    <html>
    <head>
    <title>Affichage de Commande</title>
    </head>
    <body>
    <?php 
    $sql = 'SELECT * FROM Commande';
    $req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    while ($data = mysqli_fetch_array($req)) {
	
    // on affiche les résultats
    echo 'Date de la commande : '.$data['date_commande'].'<br />';
 
    }
    mysqli_free_result ($req);
    mysqli_close ();
    ?>
    </body>
    </html>