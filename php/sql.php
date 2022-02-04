<?php
    function connect(){
        $db = new PDO('mysql:host=localhost;dbname=annuaire;charset=utf8','root','root');
        return $db;
    }

    function insert($exemple){
        $db = connect();
        $sql = "INSERT INTO `exemple` (`exemple`) VALUES ('$exemple')";            
        $db->exec($sql);
    }

    function modify($exemple){
        $db = connect();
        $sql = "UPDATE `exemple` SET `exemple`='$exemple' WHERE `exemple` = '$exemple'";
        $db->exec($sql);
    }
?>