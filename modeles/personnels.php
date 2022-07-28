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

        mysqli_set_charset($mysqli, "utf8");

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

    public static function ajouter($date_heures, $prenom, $nom, $telelphone, $courriel) {
        $message = "";

        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("INSERT INTO rendez_vous (date_heures) VALUES(?),
        INSERT INTO clients (prenom, nom, telelphone, courriel) VALUES(?, ?, ?, ?)")) {

            $requete->bind_param("ssddi", $date_heures, $prenom, $nom, $telelphone, $courriel);

            if ($requete->execute()) {
                $message = "Rendez-vous ajouté avec succès";
            } else {
                $message = "Erreur lors de l'ajout du rendez-vous" . $requete->error;
            }

            $requete->close();

        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit(); 
        }

        return $message;

    }

    public static function editer($date_heures, $prenom, $nom, $telelphone, $courriel) {
        $message = "";

        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("UPDATE rendez_vous SET date_heures = ?),
        (UPDATE clients SET prenom = ?, nom = ?, telelphone = ?, courriel = ?")) {

            $requete->bind_param("ssddi", $date_heures, $prenom, $nom, $telelphone, $courriel);

            if ($requete->execute()) {
                $message = "Rendez-vous modifié avec succès";
            } else {
                $message = "Erreur lors de la modification du rendez-vous" . $requete->error;
            }

            $requete->close();

        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit(); 
        }

        return $message;

    }

    public static function supprimer($id) {
        $message = "";

        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("DELETE FROM produits WHERE id=?")) {

            $requete->bind_param("i", $id);

            if ($requete->execute()) {
                $message = "Rendez-vous supprimé avec succès";
            } else {
                $message = "Erreur lors de la suppression du rendez-vous" . $requete->error;
            }

            $requete->close();
            
    } else {
        echo "Une erreur a été détectée dans la requête utilisée : ";
        echo $mysqli->error;
        echo "<br>";
        exit(); 
    }

    return $message;
        
}


}