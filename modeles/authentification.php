<?php

require_once "./include/config.php";

class modele_authentification {
    public $id;
    public $code_utilisateur;
    public $mot_de_passe;
    public $courriel;

    public function __construct($id, $code_utilisateur, $mot_de_passe, $courriel) {
        $this->id = $id;
        $this->code_utilisateur = $code_utilisateur;
        $this->mot_de_passe = $mot_de_passe;
        $this->courriel = $courriel;
    }

    static function connecter() {

        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        if ($mysqli -> connect_errno) {
            echo "Échec de la connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        }

        return $mysqli;

    }

    public static function ObtenirUn($code_utilisateur) {
        $mysqli = self::connecter();

        if ($requete = $mysqli -> prepare("SELECT * FROM utilisateurs WHERE code_utilisateur=?")) {
            $requete -> bind_param("s", $code_utilisateur);

            $requere -> execute();

            $result = $requete -> $get_result();

            if($enregistrement = $result -> fetch_assoc()) {
                $utilisateur = new modele_authentification($enregistrement['id'], $enregistrement['code_utilisateur'], $enregistrement['mot_de_passe'], $enregistrement['courriel']);
            } else {
                return null;
            }

            $requete -> close();
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli -> error;
            return null;
        }

        return $utilisateur;

    }

    public static function ajouter($code_utilisateur, $mot_de_passe, $courriel) {
        $message = '';

        $mysqli = self::connecter();

        if ($requete = $mysqli -> prepare("INSERT INTO utilisateurs(code_utilisateur, mot_de_passe, courriel) VALUES(?, ?, ?)")) {

            echo $mot_de_passe / "<br>";
            echo password_hash("test", PASSWORD_DEFAULT) . "<br>";

            $mot_de_passe_crype = password_hash($mot_de_passe, PASSWORD_DEFAULT);

            $requete -> bind_param("sss", $code_utilisateur, $mot_de_passe_crypte, $courriel);

            if ($requete -> execute()) {
                $message = "Utilisateur ajouté avec succès";
            } else {
                $message = "Une erreur est survenue lors de l'ajout de l'utilisateur" . $requete -> error;
            }

            $requete -> close();

        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli -> error;
            echo "<br>";
            exit();
        }

        return $message;

    }
}

?>