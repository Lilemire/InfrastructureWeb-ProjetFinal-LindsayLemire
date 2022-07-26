<?php

require_once './modeles/nouvelles.php';

class ControlleursNouvelles {

    function afficherCartesSurAccueil() {
            $nouvelles = modeles_nouvelles::ObtenirTrois();
            require 'vues/nouvelles/cartes.php';
    }
    
    function afficherUneFiche() {
        $nouvelle = modeles_nouvelles::ObtenirUne($_GET["id"]);
        require './vues/nouvelles/uneFiche.php';
    } 

    function afficherListe() {
        $nouvelles = modeles_nouvelles::ObtenirActive();
        require 'vues/nouvelles/liste.php';
    }

    function afficherListeLorem() {
        $nouvelles = modeles_nouvelles::ObtenirLorem();
        require 'vues/nouvelles/listelorem.php';
    }
}

?>