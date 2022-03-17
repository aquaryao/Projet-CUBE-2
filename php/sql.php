<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    function connect(){
        $db = new PDO('mysql:host=localhost;dbname=cube2;charset=utf8','root','root');
        return $db;
    }

    function insert($exemple){
        $db = connect();
        $sql = "INSERT INTO `base` (`exemple`) VALUES ('$exemple')";            
        $db->exec($sql);
    }

    function update($exemple){
        $db = connect();
        $sql = "UPDATE `base` SET `exemple` = '$exemple' WHERE `exemple` = '$exemple'";
        $db->exec($sql);
    }

    function select($exemple){
        $db = connect();
        $sql = "SELECT 'exemple' FROM `base`";
        $db->query($sql);
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
        $sql = $db->prepare("UPDATE `fils` SET `nombrmes` = (SELECT COUNT(idfils) FROM `messages` WHERE `idfils` = :idfils), `datelastmes` = NOW()");
        $sql->BindParam(':idfils',$fils, PDO::PARAM_INT);
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
        $sql = $db->prepare("SELECT `pseudo`,`message`,`messages`.`creation` FROM `messages` INNER JOIN `fils` ON `fils`.`idfils` = `messages`.`idfils` INNER JOIN `utilisateur` ON `messages`.`iduser` = `utilisateur`.`iduser` WHERE `fils`.`idfils` = :idfils");
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





    function Connexion(){
        $db = connect();
    
        $login = $_POST['user'];
        $mdp = $_POST['mdp'];
    
        $sql = $db->prepare("SELECT * FROM `utilisateur` WHERE `pseudo` = :pseudo AND `mdp` = :mdp");
    
        $sql->bindParam(':pseudo', $login);
        $sql->bindParam(':mdp', $mdp);
    
        $sql->execute();
        
        $resultat = $sql->fetch(PDO::FETCH_ASSOC);
    
        $sql->closeCursor();
        
        if ($resultat) {
            $_SESSION['connecte'] = 'oui';
            $_SESSION['user'] = $resultat['iduser'];
            header('location:../html/compte.php');
            exit;
        } else {
            echo "Non";
        }
    }
?>
