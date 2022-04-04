<?php
    require_once("../php/sql.php");
    if(isset($_SESSION['connecte'])&&$_SESSION['connecte'] == 'oui') {
        header('location:compte.php');
    }
    if (isset($_POST['nom'])&& $_POST['nom'] != null) {
        Inscription();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Cesisport</title>
    <link rel="stylesheet" href="../css/menu.css">
</head>
<body>
    <?php require_once("../php/menu.php")?>
    <script src="../js/menu.js"></script>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" name="nom">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom">
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo">
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp">
        <label for="confirmdp">Confirmation de mot de passe</label>
        <input type="password" name="confirmdp">
        <label for="age">Âge :</label>
        <input type="number" name="age">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="photo">Photo de profil</label>
        <input type="file" name="photo" accept=".png,.jpg,.jpeg">
        <button type="submit">Envoyer</button>
    </form>
</body>
</html> 