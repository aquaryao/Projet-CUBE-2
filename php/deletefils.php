<?php
    require_once('sql.php');
    DeleteFils($_POST['supprimer']);
    header('location:../html/forum.php');