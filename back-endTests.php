<?php

    require_once './utils/dbParams.php';
    require_once './utils/dao.class.php';

    $dao = new DAO();

    // $dataA1 = array('titre' => 'séance du tp', 'description' => 'travaux pratique du module: web 1');
    // $dao->ajouterNote($dataA1);

    // $allNotes = $dao->getAllNotes();
    // echo gettype($allNotes);
    // print_r($allNotes);
    // var_dump($allNotes);
    // foreach($allNotes as $n){
    //     // var_dump($n);
    //     echo $n['title'];
    // }

    // $dao->getAllNotesV2();

    // $dataG1 = array('idN' => 4);
    // $noteByID = $dao->getNoteByID($dataG1);
    // var_dump($noteByID);

    // $dataM1 = array('idN' => 4, 'tit' => 'Séance de tp - modifiée', 'desc' => 'travaux pratique - modifées', 'stat' => 001, 'tstamp' => date('Y-m-d h:i:sa'));
    // $dao->modifierNote($dataM1);


    // $dataS1 = array('idN' => 3);
    // $dao->supprimerNote($dataS1);

