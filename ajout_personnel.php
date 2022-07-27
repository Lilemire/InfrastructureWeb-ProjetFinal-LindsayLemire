<?php include_once('include/header.php');
require_once 'controlleurs/personnel.php';

    if (isset($_POST['boutonAjouter'])) {
        $controlleurPersonnel = new ControlleursPersonnel;
        $controlleurPersonnel->ajouterPersonnel();
    }
?>

<h1>Ajouter</h1>

<form method="POST">
    <div>
        <div>
            <label for="date_heures">Date et heures</label>
            <input type="date" id="date_heures" name="date_heures" required>