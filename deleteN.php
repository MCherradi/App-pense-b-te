<?php

    require_once './includes/header.php';

    if(isset($_GET['idPB'])){
        $data['idN'] = $_GET['idPB'];
        $res = $dao->supprimerNote($data);
    }
