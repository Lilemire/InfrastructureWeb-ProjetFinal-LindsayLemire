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

    function ajouter() {
        if(isset($_POST['date_heures']) && isset ($_POST['prenom']) && isset ($_POST['nom']) && isset ($_POST['telelphone']) && isset ($_POST['courriel'])) {
            $message = modeles_personnels_rdv::Ajouter($_POST['date_heures'], $_POST['prenom'], $_POST['nom'], $_POST['telelphone'], $_POST['courriel']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter le rendez-vous. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    function editer() {
        if(isset($_POST['date_heures']) && isset ($_POST['prenom']) && isset ($_POST['nom']) && isset ($_POST['telelphone']) && isset ($_POST['courriel'])) {
            $message = modeles_personnels_rdv::editer($_POST['date_heures'], $_POST['prenom'], $_POST['nom'], $_POST['telelphone'], $_POST['courriel']);
            echo $message;
        } else {
            $erreur = "Impossible d'éditer le rendez-vous. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    function supprimer() {
        if(isset($_GET['id'])) {
            $message = modeles_personnels_rdv::Supprimer($_GET['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le rendez-vous. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }
}
?>