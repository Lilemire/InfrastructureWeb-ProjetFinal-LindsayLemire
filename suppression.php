<?php include_once('include/header.php'); ?>
<?php include_once('controlleurs/personnels.php');

if (isset($_POST['boutonSupprimer'])) {
    $controlleursPersonnels=supprimer();
}
?>

    <h1>Formulaire de suppression d'un rendez-vous</h1>

    <?php
    $controlleursPersonnels=new ControlleursPersonnels;
    $controlleursPersonnels->supprimer();
    ?>

<a href="administration_module_personnel.php">Retour</a>

<?php include_once('include/footer.php'); ?>