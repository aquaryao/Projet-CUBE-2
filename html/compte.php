<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte - Cesisport</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/compte.css">
</head>
<body>
    <?php require_once("../php/menu.php");
    require_once('../php/sql.php');
    $profil = Profil();
    echo '<main>';
    echo '
    <div>
    <img src="../img/'.$profil['photo'].'">
    <div>
        <h4>Pseudo : </h4>
        <span>'.$profil['pseudo'].'</span>
    </div>
    <div>
        <h4>Nom : </h4>
        <div>'.$profil['nom'].'</div>
    </div>
    <div>
        <h4>Prenom : </h4>
        <div>'.$profil['prenom'].'</div>
    </div>
    <div>
        <h4>Email : </h4>
        <div>'.$profil['email'].'</div>
    </div>
    </div>';
    echo '</main>';
    ?>
    <form action="../php/deconnexion.php">
        <button type="submit">Se déconnecter</button>
    </form>
    <script src="../js/menu.js"></script>
</body>
</html>