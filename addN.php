<?php

    require_once './includes/header.php';

    // Vérifier si le formulaire est soumis c-à-d: le boutton "Ajouter" est clické
    if(isset($_POST['submit'])){
        // Récuperation des données du formulaire
        // echo "clicked";

        $data['titre'] = $_POST['title'];
        $data['description'] = $_POST['description'];
        
        // Lire les paramètres récupérer
        // print_r($data);

        $dao->ajouterNote($data);

        header('location:index.php');


    }

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">Ajouter une pense-bête</div>
                <div class="card-body">
          
                    <form method="POST">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="title" class="form-control" placeholder="Titre du pense-bête" required>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <textarea class="form-control" name="description" placeholder="Description du pense-bête" rows="3" required></textarea>
                        </div>
                        <!-- <div class="form-group">
                            <label for=""></label>
                            <select class="form-control" required>
                                <option value="" disabled selected>Status du pense-bête</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary mt-2">Ajouter</button>
                        </div>
                    </form>


                </div> 
                <div class="card-footer d-flex justify-content-center"> Dévelopée par: Mohamed CHERRADI © <?php echo date('Y'); ?> </div>
            </div>
        </div>
    </div>

</div>