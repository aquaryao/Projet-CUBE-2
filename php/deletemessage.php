<?php
    require_once('sql.php');
    DeleteMessage($_POST['supprimer']);
    header('location:../html/forum-fils.php');