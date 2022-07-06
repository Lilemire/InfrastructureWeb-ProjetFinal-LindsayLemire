<?php

require_once './modeles/nouvelles.php';

class ControlleursNouvelles {

    function afficherFiche() {
            $nouvelles = nouvelles_obtenir3::ObtenirTrois();
                require 'vues/nouvelles/fiche.php';
    }
}

?>