<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function connect(){
    $db = new PDO('mysql:host=localhost;dbname=cube2;charset=utf8','root','root' );
    return $db;
}





function DeleteFils($numfils){
    $db = connect();
    
    $sub_query = $db->prepare("SELECT `idfils` FROM `fils` ORDER BY `idfils` LIMIT :numfils,1");
    $numfils = intval($numfils);
    $sub_query->BindParam(':numfils',$numfils, PDO::PARAM_INT);
    $sub_query->execute();
    $res_sub = $sub_query->fetch();
    $sub_query->closeCursor();
    
    $sql = $db->prepare("DELETE FROM `fils` WHERE `fils`.`idfils` = :res_sub");
    $sql->BindParam(':res_sub',$res_sub['idfils'], PDO::PARAM_INT);
    $sql->execute();
    $resultat = $sql->fetchAll();
    $sql->closeCursor();
}

function DeleteMessage($nummess){
    $db = connect();
    $fils = $_SESSION['fils'];
    $sub_query = $db->prepare("SELECT `idmess` FROM `messages` WHERE `idfils` = :idfils ORDER BY `idmess` LIMIT :nummess,1");
    $sub_query->BindParam(':idfils',$fils, PDO::PARAM_INT);
    $nummess = intval($nummess);
    $sub_query->BindParam(':nummess',$nummess, PDO::PARAM_INT);
    $sub_query->execute();
    $res_sub = $sub_query->fetch();
    $sub_query->closeCursor();
    
    $sql = $db->prepare("UPDATE `messages` SET `message` = 'Message supprimé par un administateur' WHERE `messages`.`idmess` = :res_sub");
    $sql->BindParam(':res_sub',$res_sub['idmess'], PDO::PARAM_INT);
    $sql->execute();
    $resultat = $sql->fetchAll();
    $sql->closeCursor();
}





function UpdateFilsInfos($fils){
    $db = connect();
    $sub_query = $db->prepare("SELECT `idfils` FROM `fils` ORDER BY `idfils` LIMIT :fils,1");
    $fils = intval($fils);
    --$fils;
    $sub_query->BindParam(':fils',$fils, PDO::PARAM_INT);
    $sub_query->execute();
    $res_sub = $sub_query->fetch();
    $sub_query->closeCursor();
    
    $sql = $db->prepare("UPDATE `fils` SET `nombrmes` = (SELECT COUNT(`idmess`) FROM `messages` WHERE `idfils` = :idfils), `datelastmes` = NOW() WHERE `idfils` = :idfils");
    $sql->BindParam(':idfils',$res_sub['idfils'], PDO::PARAM_INT);
    $sql->execute();
    $resultat = $sql->fetchAll();
    $sql->closeCursor();
}

function InsertMessage($message){
    $db = connect();
    $fils = $_SESSION['fils'];
    $user = $_SESSION['user'];
    $sql = $db->prepare("INSERT INTO `messages` (`message`,`idfils`,`creation`,`iduser`) VALUES (:message,:idfils,NOW(),:iduser)");
    $sql->BindParam(':message',$message, PDO::PARAM_STR);
    $sql->BindParam(':idfils',$fils, PDO::PARAM_INT);
    $sql->BindParam(':iduser',$user, PDO::PARAM_INT);
    $sql->execute();
    $resultat = $sql->fetchAll();
    $sql->closeCursor();
    
    UpdateFilsInfos($fils);
}

function InsertFils($titre){
    $db = connect();
    $user = $_SESSION['user'];
    $sql = $db->prepare("INSERT INTO `fils` (`titre`,`iduser`,`nombrmes`,`creation`,`lien`) VALUES (:titre,:iduser,0,NOW(),'forum-fils.php')");
    $sql->BindParam(':titre',$titre, PDO::PARAM_STR);
    $sql->BindParam(':iduser',$user, PDO::PARAM_INT);
    $sql->execute();
    $resultat = $sql->fetchAll();
    $sql->closeCursor();
}





function SelectDiscussion(){
    $db = connect();
    $sql = $db->prepare("SELECT `pseudo`,`message`,`messages`.`creation`,`photo` FROM `messages` INNER JOIN `fils` ON `fils`.`idfils` = `messages`.`idfils` INNER JOIN `utilisateur` ON `messages`.`iduser` = `utilisateur`.`iduser` WHERE `fils`.`idfils` = :idfils");
    $sql->BindParam('idfils',$_SESSION['fils']);
    $sql->execute();
    $resultat = $sql->fetchAll();
    $sql->closeCursor();
    
    return $resultat;
}

function SelectFils(){
    $db = connect();
    $sql = $db->prepare("SELECT `titre`,`pseudo`,`nombrmes`,`creation`,`datelastmes`,`lien`,`idfils` FROM `fils` INNER JOIN `utilisateur` ON `utilisateur`.`iduser` = `fils`.`iduser`");
    $sql->execute();
    $resultat = $sql->fetchAll();
    $sql->closeCursor();
    
    return $resultat;
}






function Inscription(){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $photo = $_FILES['photo']['name'];
    $mdp = $_POST['mdp'];
    $confirmdp = $_POST['confirmdp'];
    
    $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detectedType = exif_imagetype($_FILES['photo']['tmp_name']);
    if (!in_array($detectedType, $allowedTypes)) {
        echo "Type de fichier invalide";
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse Email invalide";
        exit;
    }
    
    if ($mdp  != $confirmdp) {
        echo "Le mot de de passe et sa confirmation sont différent";
        exit;
    }
    $mdp  = password_hash($mdp,PASSWORD_DEFAULT);
    
    $uploaddir = '/Applications/MAMP//htdocs/Projet-CUBE-2/img/';
    $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
    
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        var_dump($_FILES['photo']['tmp_name']);
        echo "<br>";
        echo $uploadfile;
        echo "<br>";    
        echo"L'envoie du fichier à échoué ou le fichier est invalide";
        exit;
    }
    
    $db = connect();
    
    $sql = $db->prepare("INSERT INTO `utilisateur` (`nom`,`prenom`,`pseudo`,`mdp`,`age`,`email`,`photo`) VALUES (:nom,:prenom,:pseudo,:mdp,:age,:email,:photo)");
    
    $sql->BindParam(':nom',$nom, PDO::PARAM_STR);
    $sql->BindParam(':prenom',$prenom, PDO::PARAM_STR);
    $sql->BindParam(':pseudo',$pseudo, PDO::PARAM_STR);
    $sql->BindParam(':mdp',$mdp, PDO::PARAM_STR);
    $sql->BindParam(':age',$age, PDO::PARAM_INT);
    $sql->BindParam(':email',$email, PDO::PARAM_STR);
    $sql->BindParam(':photo',$photo, PDO::PARAM_STR);
    $sql->execute();
    $resultat = $sql->fetchAll();
    $sql->closeCursor();
    
    header("location:connexion.php");
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $photo = $_FILES['photo']['name'];
    $mdp = $_POST['mdp'];
    $confirmdp = $_POST['confirmdp'];
    
    $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detectedType = exif_imagetype($_FILES['photo']['tmp_name']);
    if (!in_array($detectedType, $allowedTypes)) {
        echo "Type de fichier invalide";
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse Email invalide";
        exit;
    }
    
    if ($mdp  != $confirmdp) {
        echo "Le mot de de passe et sa confirmation sont différent";
        exit;
    }
    $mdp  = password_hash($mdp,PASSWORD_DEFAULT);
    
    $uploaddir = '/Applications/MAMP//htdocs/Projet-CUBE-2/img/';
    $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
    
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        var_dump($_FILES['photo']['tmp_name']);
        echo "<br>";
        echo $uploadfile;
        echo "<br>";    
        echo"L'envoie du fichier à échoué ou le fichier est invalide";
        exit;
    }
    
}

function Connexion(){
    
    $login = $_POST['user'];
    $mdp = $_POST['mdp'];
    
    if (strlen($mdp) > 30) {
        echo "Le mot de passe dépasse le nombre de caractère autorisé";
        exit;
    }
    
    $db = connect();
    
    $sql = $db->prepare("SELECT `mdp`,`iduser` FROM `utilisateur` WHERE `pseudo` = :pseudo");
    
    $sql->bindParam(':pseudo', $login);
    
    $sql->execute();
    
    $resultat = $sql->fetch(PDO::FETCH_ASSOC);
    
    $sql->closeCursor();
    
    if (password_verify($mdp,$resultat['mdp'])) {
        $_SESSION['connecte'] = 'oui';
        $_SESSION['user'] = $resultat['iduser'];
        header('location:../html/compte.php');
    } else {
        echo "Non";
    }
}
function Profil()
{
    $db = connect();
    
    $login = $_SESSION['user'];
    
    $sql = $db->prepare("SELECT `pseudo`,`nom`,`prenom`,`age`,`email`,`photo` FROM `utilisateur` WHERE `iduser` = :user");
    
    $sql->bindParam(':user', $login);
    
    $sql->execute();
    
    $resultat = $sql->fetch(PDO::FETCH_ASSOC);
    
    $sql->closeCursor();
    
    return $resultat;
}

?>