<?php

    if(isset($_SESSION['added'])){
        $alertA = "<div class='alert alert-warning'> <strong>Added!</strong>" .$_SESSION['added']. "</div>";
        echo $alertA;
        session_destroy();
    }
    if(isset($_SESSION['updated'])){
        $alertU = "<div class='alert alert-success'> <strong>Updated!</strong>" .$_SESSION['updated'] . "</div>";
        echo $alertU;
        session_destroy();
    }
    if(isset($_SESSION['deleted'])){
        $alertD = "<div class='alert alert-danger'> <strong>Deleted!</strong>" .$_SESSION['deleted']. "</div>";
        echo $alertD;
        session_destroy();
    }