<?php

require_once './modeles/nouvelles.php';

class ControlleursNouvelles {

    function afficherCartesSurAccueil() {
            $nouvelles = modeles_nouvelles::ObtenirTrois();
                require 'vues/nouvelles/cartes.php';
    }
}

class ControlleursNouvelle {
    
    function afficherUneFiche() {
        $nouvelles = nouvelle::ObtenirUne();
        require './vues/nouvelles/uneFiche.php';
    } 
}

class ControlleursNouvellesActive {

    function afficherListe() {
        $nouvelles = nouvelles_active::ObtenirActive();
        require 'vues/nouvelles/liste.php';
    }
}

?>