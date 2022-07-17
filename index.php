<?php include_once('include/header.php'); 
include_once('controlleurs/nouvelles.php');?>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Projet final</h1>

    <!-- Marketing Icons Section -->
    <?php
    $controlleurNouvelles=new ControlleursNouvelles;
    $controlleurNouvelles->afficherCartesSurAccueil();
    ?>

<?php include_once('include/footer.php'); ?>
