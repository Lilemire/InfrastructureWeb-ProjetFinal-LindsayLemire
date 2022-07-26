<?php 

require_once "./include/config.php";

class modeles_personnels_clients {
    public $id;
    public $prenom;
    public $nom;
    public $ville;
    public $telephone;
    public $courriel;

    public function __construct($id, $prenom, $nom, $ville, $telephone, $courriel) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->ville = $ville;
        $this->telephone = $telephone;
        $this->courriel = $courriel;
    }

    static function connecter() {

        $mysqli = new mysqli (Dbp::$host, Dbp::$username, Dbp::$password, Dbp::$database);

        if ($mysqli -> connect_errno) {
            echo "Échec de la connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        }

        return $mysqli;

    }

}

class modeles_personnels_rdv {
    public $id;
    public $id_clients;
    public $id_employes;
    public $date_heures;

    public function __construct($id, $id_clients, $id_employes, $date_heures) {
        $this->id = $id;
        $this->id_clients = $id_clients;
        $this->id_employes = $id_employes;
        $this->date_heures = $date_heures;
    }

    static function connecter() {

        $mysqli = new mysqli (Dbp::$host, Dbp::$username, Dbp::$password, Dbp::$database);

        if ($mysqli -> connect_errno) {
            echo "Échec de la connexion à la base de données MySQL: " . $mysqli -> connect_error;
            exit();
        }

        return $mysqli;

    }

}

public static function ObtenirRdv() {
    $tableau = [];
    $mysqli = self::connecter();

    $resultatRequete = $mysqli->query("SELECT date_heures, prenom, nom FROM rendez_vous INNER JOIN clients ON rendez_vous.id_clients = clients.id;");
        
    foreach ($resultatRequete as $row) {
        $tableau [] = new modeles_personnels_rdv($row['date_heures'], $row['prenom'], $row['nom']);
    }

    return $tableau;
    
}