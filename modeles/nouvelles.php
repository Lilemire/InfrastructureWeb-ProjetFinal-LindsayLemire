<?php

require_once "./include/config.php";

class modeles_nouvelles {
    public $id;
    public $titre;
    public $description_courte;
    public $description_longue;
    public $date_nouvelle;
    public $actif;
    public $fk_categorie;

    public function __construct($id, $titre, $description_courte, $description_longue, $date_nouvelle, $actif, $fk_categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description_courte = $description_courte;
        $this->description_longue = $description_longue;
        $this->date_nouvelle = $date_nouvelle;
        $this->actif = $actif;
        $this->fk_categorie = $fk_categorie; 
    }

    static function connecter() {

        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        if ($mysqli -> connect_errno) {
            echo "Échec de la connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        }

        return $mysqli;

}

    public static function ObtenirTrois() {
        $fiche = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM nouvelles WHERE actif = 1 ORDER BY date_nouvelle DESC LIMIT 3");

        foreach ($resultatRequete as $row) {
            $liste [] = new modeles_nouvelles($row['id'], $row['titre'], $row['description_courte'], $row['description_longue'], $row['date_nouvelle'], $row['actif'], $row['fk_categorie']);
        }

        return $liste;

    }

    public static function ObtenirUne($id) {
            $mysqli = self::connecter();

            if ($requete = $mysqli->prepare("SELECT * FROM nouvelles WHERE id = ?")){
                $requete->bind_param("s", $id);

                $requete->execute();

                $result = $requete->get_result();

                if($resultatRequete = $result->fetch_assoc()) {
                    $uneNouvelle = new modeles_nouvelles($resultatRequete['id'], $resultatRequete['titre'], $resultatRequete['description_courte'], $resultatRequete['description_longue'], $resultatRequete['date_nouvelle'], $resultatRequete['actif'], $resultatRequete['fk_categorie']);
                } else {

                    return null;

                }

                $requete->close();
            } else {
                echo "Une erreur a été détectée dans la requête utilisée : ";
                echo $mysqli->error;
                return null;
            }

            return $uneNouvelle;

    }

    public static function ObtenirActive() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM `nouvelles` WHERE actif = 1 ORDER BY date_nouvelle;");

        foreach ($resultatRequete as $ul) {
            $liste [] = new modeles_nouvelles($ul['id'], $ul['titre'], $ul['description_courte'], $ul['description_longue'], $ul['date_nouvelle'], $ul['actif'], $ul['fk_categorie']);
        }

        return $liste;

    }

   /* public static function ObtenirLorem() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("")
    }*/
}
?>