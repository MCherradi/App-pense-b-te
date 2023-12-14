<?php

    /**
     * 
     * Puisque le fichier "header.php" va être inclus dans tous les autres fichiers, donc, les inclusions php, vont être dans ce fichier
     * 
     * Mais, attention aux chemin des inclusions. En effet, si le fichier "header.php" va être inclus dans "index.php"
     * 
     * Donc, le chemin des inclusions require_once vont être adaptée selon le chemin de "index" et non du fichier "heade" 
     * 
     */



    // Il faut mettre le dossier courant "." et ne pas parrent "..", parce que:
    // Le fichier "header.php" va être inclus dans "index.php". 
    // Et pour accéder au dossier "utils" à partir de "index.php" il faut mettre que le dossier courant et ne pas parent

    require_once './utils/dbParams.php';
    require_once './utils/dao.class.php';

    // instancié l'objet à partir de la classe DAO
    $dao = new DAO();

    // Création de la session
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Application Pense-bête</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Pense-bête App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="addN.php">Ajouter</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Link</a></li>
            <li><a class="dropdown-item" href="#">Another link</a></li>
            <li><a class="dropdown-item" href="#">A third link</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
  </div>
</nav>

</body>
</html>


