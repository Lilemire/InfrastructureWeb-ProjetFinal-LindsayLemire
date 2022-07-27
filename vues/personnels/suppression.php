<h1>Suppression</h1>

<form method="POST">
    <div>
        <h3><?php $personnel->date_heures?></h3>
        <p>Prenom : <?php $personnel->prenom?></p>
        <p>Nom : <?php $personnel->nom?></p>
        <p>Téléphone : <?php $personnel->telelphone?></p>
        <p>Courriel : <?php $personnel->courriel?></p>
    </div>
    <a href="suppression.php" class="btn btn-primary" aria-label="Supprimer">Supprimer</a>
</form>