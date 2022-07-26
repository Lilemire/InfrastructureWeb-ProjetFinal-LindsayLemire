<?php

require_once './modeles/personnels.php';

class ControlleursPersonnels {

    function afficherTableauPersonnels() {
        $personnels = modeles_personnels::ObtenirRdv();
        require 'vues/personnels/tableau.php';
    }
}

?>