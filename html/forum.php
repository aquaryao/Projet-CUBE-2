<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - Cesisport</title>
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
    <?php 
    require_once("../php/menu.php");
    require_once("../php/sql.php");
    if ($_SESSION['connecte'] != 'oui') {
        header('location:connexion.php');
    }
    $fils = SelectFils();
    foreach ($fils as $key => $value) {
        echo'<a href="'.$value['lien'].'?fils='.$value['idfils'].'"><div>
            <span>'.$value['nombrmes'].'</span>
            <span>'.$value['titre'].' - '.$value['pseudo'].'</span>
            <span>
                <div>'.$value['creation'].'</div>
                <div>'.$value['datelastmes'].'</div>
            </span>
        </div></a>';
        if (isset($_SESSION['user'])&&$_SESSION['user'] == 1) {
            echo '
            <form action="../php/deletefils.php" method="post">
                <button name="supprimer" type="submit" value='.$key.'>Supprimer</button>
            </form>';
        }
    }
    ?>
    <form action="../php/ajouterfils.php" method='post'>
        <label for="fils">Créer un fil : </label>
        <textarea name="titre" cols="70" rows="1"></textarea>
        <button type="submit">Envoyer</button>
    </form>
    <script src="../js/menu.js"></script>
</body>
</html>