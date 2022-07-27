<?php

require_once './modeles/personnels.php';

class ControlleursPersonnels {

    function afficherTableauPersonnels() {
        $personnels = modeles_personnels_rdv::ObtenirRdv();
        require 'vues/personnels/tableau.php';
    }

    function afficherListeAdministrationPersonnels() {
        $personnels = modeles_personnels_rdv::ObtenirListeAdministrationPersonnels();
        require 'vues/personnels/liste.php';
    }
}

?>