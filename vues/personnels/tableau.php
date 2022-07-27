<?php
    foreach ($personnels as $personnel) {
?>

<div class = "row">
    <div class = "col-12">
        <div class = "card h-100">
        <div class = "card-text">
            <p>Date et heures : <?=$personnel->date_heures?></p>
            <p>Prenom : <?=$personnel->prenom?></p>
            <p>Nom : <?=$personnel->nom?></p>
            <p>Téléphone : <?=$personnel->telelphone?></p>
            <p>Courriel : <?=$personnel->courriel?></p>
        </div>
        </div>
    </div>
</div>
<?php
    }
?>