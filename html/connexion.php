<?php
    require_once("../php/sql.php");
    if(isset($_SESSION['connecte'])&&$_SESSION['connecte'] == 'oui') {
        header('location:compte.php');
    }
    if (isset($_POST['user'])&& $_POST['user'] != null) {
        Connexion();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Cesisport</title>
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
    <?php require_once("../php/menu.php")?>
    <form method="post" action="">
        <label for="user">Utilisateur :</label>
        <input type="text" name="user">
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp">
        <button>Se connecter</button>
    </form>
    <script src="../js/menu.js"></script>
</body>
</html>