<?php
    function connect(){
        $db = new PDO('mysql:host=localhost;dbname=base;charset=utf8','root','root');
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
?>