<ul>
    <?php foreach ($personnels as $personnel) { ?>
    <li><h1>(<?=$personnel->date_heures?>)</h1>
        <p>Prenom : <?=$personnel->prenom?></p>
        <p>Nom : <?=$personnel->nom?></p>
        <p>Téléphone : <?=$personnel->telelphone?></p>
        <p>Courriel : <?=$personnel->courriel?></p>

        <a href="editer_personnel.php" class="btn btn-primary" aria-label="editer">Éditer</a>
        <a href="suppression.php" class="btn btn-primary" aria-label="Supprimer">Supprimer</a>
        
    <?php } ?>
</ul>