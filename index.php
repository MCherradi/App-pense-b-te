<?php
    require_once './includes/header.php';

    $allNotes = $dao->getAllNotes();
    // print_r($allNotes);
?>


<div class="container mt-5">

  <div class="card">
    <?php require_once './includes/alerts.php'; ?>
    <div class="card-header">Liste des pense-bêtes</div>
    <div class="card-body">

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Status</th>
                <th>Timestamp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $dao->getAllNotesV2(); ?>

            <?php //foreach($allNotes as $n){ ?>
            <!-- <tr>
                <td><?php // echo $n['id']; ?></td>
                <td><?php // echo $n['title']; ?></td>
                <td><?php // echo $n['description']; ?></td>
                <td><?php // echo $n['status']; ?></td>
                <td><?php // echo $n['created_at']; ?></td>
                <td colspan="2">

                </td>
            </tr> -->
            <?php //} ?>
        
        </tbody>
    </table>

    </div> 
    <div class="card-footer d-flex justify-content-center"> Dévelopée par: Mohamed CHERRADI © <?php echo date('Y'); ?> </div>
  </div>

</div>
