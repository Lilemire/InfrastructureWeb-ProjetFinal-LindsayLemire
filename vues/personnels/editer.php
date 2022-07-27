<h1>Éditer</h1>

<form method="POST">
    <div>
        <div>
            <label for="date_heures">Date et heures</label>
            <input type="text" id="date_heures" name="date_heures" placeholder="AAAA-MM-DD HH:MM:SS" required>
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required minlength="2" maxlength="50" maxlength="50">
        </div>
        <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required minlength="2" maxlength="50">
        </div>
        <div>
            <label for="telelphone">Téléphone</label>
            <input type="number" id="telelphone" name="telelphone" required minlength="10" maxlength="20">
        </div>
        <div>
            <label for="courriel">Courriel</label>
            <input type="email" id="courriel" name="courriel" required minlength="10" maxlength="50">
        </div>
        <div>
            <input type="submit" name="boutonEditer" value="Editer">
        </div>
    </div>
</form>