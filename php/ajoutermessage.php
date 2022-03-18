<?php
    require_once('sql.php');
    InsertMessage($_POST['message']);
    header('location:../html/forum-fils.php');