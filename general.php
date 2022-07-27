<?php include_once('include/header.php'); 
include_once('controlleurs/nouvelles.php');?>

<div class="container">
    <h1 class="my-4">Général</h1>

    <?php
    $controlleurNouvelles=new ControlleursNouvelles;
    $controlleurNouvelles->afficherListeGeneral();

    ?>

    <?php include_once('include/footer.php'); ?>