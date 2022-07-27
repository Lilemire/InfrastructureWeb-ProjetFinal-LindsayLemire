<?php 

require_once "./include/config.php";

class modeles_personnels_rdv {
    public $date_heures;
    public $prenom;
    public $nom;
    public $telelphone;
    public $courriel;

    public function __construct($date_heures, $prenom, $nom, $telelphone, $courriel) {
        $this->date_heures = $date_heures;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->telelphone = $telelphone;
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

    public static function ObtenirRdv() {
        $tableau = [];
        $mysqli = self::connecter();
    
        $resultatRequete = $mysqli->query("SELECT date_heures, prenom, nom, telelphone, courriel FROM rendez_vous INNER JOIN clients ON rendez_vous.id_clients = clients.id;");
            
        foreach ($resultatRequete as $row) {
            $tableau [] = new modeles_personnels_rdv($row['date_heures'], $row['prenom'], $row['nom'], $row['telelphone'], $row['courriel']);
        }
    
        return $tableau;
        
    }

    public static function ObtenirListeAdministrationPersonnels() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT date_heures, prenom, nom, telelphone, courriel FROM rendez_vous INNER JOIN clients ON rendez_vous.id_clients = clients.id;");

        foreach ($resultatRequete as $ul) {
            $liste [] = new modeles_personnels_rdv($ul['date_heures'], $ul['prenom'], $ul['nom'], $ul['telelphone'], $ul['courriel']);
        }

        return $liste;

    }
        
}


