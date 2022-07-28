<?php include_once('include/header.php'); 
include_once('controlleurs/authentification.php');?>

<?php
    $modele_authentification=new Modele_authentification;
    $modele_authentification->ajouter();
?>

<?php include_once('include/footer.php'); ?>