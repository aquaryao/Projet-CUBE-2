<?php
    require_once('sql.php');
    InsertFils($_POST['titre']);
    header('location:../html/forum.php');