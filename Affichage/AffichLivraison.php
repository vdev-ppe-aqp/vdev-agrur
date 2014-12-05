    <?php
    // on se connecte à notre base
    $base = mysqli_connect ('root', '', '');
    mysqli_select_db ('AGRUR', $base) ;
    ?>
    <html>
    <head>
    <title>Affichage de livraison</title>
    </head>
    <body>
    <?php 
    $sql = 'SELECT * FROM Livraison';
    $req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    while ($data = mysqli_fetch_array($req)) {
	
    // on affiche les résultats
    echo 'Date de livraison : '.$data['date_livraison'].'<br />';
    echo 'Type de livraison : '.$data['type_livraison'].'<br /><br />';
	echo 'Quantité : '.$data['quantite_livraison'].'<br /><br />';
	echo 'Nom du client qui recevra la livraison : '.$data['nomClient_livraison'].'<br /><br />';
    }
    mysqli_free_result ($req);
    mysqli_close ();
    ?>
    </body>
    </html>