<?php
namespace App;
// require "Controller/HomeController.php";
// require "Controller/FilmController.php";
// require "Controller/ActeurController.php";

use Controller\FilmController;
use Controller\ActeurController;
use Controller\HomeController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

// instanciation d'un controller
$filmctrl = new FilmController();
$acteurctrl = new ActeurController();
$homectrl = new HomeController();

// on vérifie l'action définie dans l'URL : l'action est obligatoire (sinon on redirige vers la page d'accueil), l'identifiant est facultatif
if(isset($_GET["action"])) {

    if(isset($_GET["id"])) { $id = $_GET["id"]; }

    switch($_GET["action"]) {

        // afficher la liste des personnages
        case "listFilms" : 
            $filmctrl->listFilms(); 
            break;

        // afficher le détail d'un personnage
        case "detailFilm" :
            $filmctrl->detailFilm($id); 
            break; 
        
        // afficher la liste des lieux
        case "listActeurs" :
            $acteurctrl->listActeurs(); 
            break;

        // afficher le détail d'un lieu + liste des personnages y habitant
        case "detailActeur" :
            $acteurctrl->detailActeur($id); 
            break;

        case "ajouterActeur" :
            $acteurctrl->ajouterActeur(); 
            break;

        case "ajouterFilm" :
            $filmctrl->ajouterFilm(); 
            break;
    }
} else {
    $homectrl->home();
}




