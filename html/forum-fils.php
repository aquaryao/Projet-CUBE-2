<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fils de discussion - Cesisport</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/fils.css">
</head>
<body>
    <?php 
    require_once("../php/menu.php");
    require_once("../php/sql.php");
    if(isset($_GET['fils'])){
        $_SESSION['fils'] = $_GET['fils'];
    }
    $discussion = SelectDiscussion();

    foreach ($discussion as $key => $value) {
        echo'
        <div>
            <img src="../img/'.$value['photo'].'" alt="Image de profil">
            <span>'.$value['pseudo'].'</span>
            <span>'.$value['message'].'</span>
            <span>'.$value['creation'].'</span>
        </div>';
        if (isset($_SESSION['user'])&&$_SESSION['user'] == 1) {
            echo '
            <form action="../php/deletemessage.php" method="post">
                <button name="supprimer" type="submit" value='.$key.'>Supprimer</button>
            </form>';
        }
    }
    ?>
    <form action="../php/ajoutermessage.php" method='post'>
        <textarea name="message" cols="70" rows="10"></textarea>
        <button type="submit">Envoyer</button>
    </form>
    <script src="../js/menu.js"></script>
</body>
</html>
