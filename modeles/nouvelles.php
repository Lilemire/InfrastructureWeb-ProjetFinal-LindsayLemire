<?php

require_once "./include/config.php";

class nouvelles_obtenir3 {
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
            $liste [] = new nouvelles_obtenir3($row['id'], $row['titre'], $row['description_courte'], $row['description_longue'], $row['date_nouvelle'], $row['actif'], $row['fk_categorie']);
        }

        return $liste;

    }
}

?>

obteniractive