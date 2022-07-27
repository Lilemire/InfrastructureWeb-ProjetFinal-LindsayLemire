<?php include_once('include/header.php');
require_once 'controlleurs/personnels.php';

if (isset($_POST['boutonEditer'])) {
    $controlleursPersonnels=new ControlleursPersonnels;
    $controlleursPersonnels->editer();
}
?>

<?php
        $controlleursPersonnels=new ControlleursPersonnels;
    $controlleursPersonnels->editer();
?>

<a href="administration_module_personnel.php">Retour</a>

<?php include_once('include/footer.php'); ?>
