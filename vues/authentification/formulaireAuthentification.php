<?php
    require_once 'controlleurs/authentification.php';

    if (isset($_POST['boutonConnexion'])) {
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->connecter();
    } else if (isset($_POST['boutonDeconnexion'])) {
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->deconnecter();
    }
?>

<?php if(!isset($_SESSION["utilisateur"])) { ?>
    <h2>Formulaire d'authentification</h2>
    <form method="POST">
        <label for="utilisateur_login">Utilisateur</label><br>
        <input type="text" id="utilisateur_login" name="utilisateur_login" required><br>

        <label for="mot_de_passe">Mot de passe</label><br>
        <input type="password" id="mot_de_passe" name="mot_de_passe_login" required>

        <button name="boutonConnexion">Connexion</button>
    </form>

    <?php } else { ?>
        Vous êtes connecté en tant que <?= $_SESSION["utilisateur"] ?>

        <form method="POST">
            <button name="boutonDeconnexion" type="submit">Déconnexion</button>
        </form>
    <?php } ?>