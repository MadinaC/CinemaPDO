<?php

//Je demande l'acces au fichier physique soit j'utilise un autoloader//
require_once "controllers/HomeController.php";
require_once "controllers/PersonController.php";
require_once "controllers/MovieController.php";
require_once "controllers/GenreController.php";
require_once "controllers/RoleController.php";
require_once "bdd/DAO.php";


//je crée des instances des controllers//

$homeCtrl = new HomeController();
$personCtrl = new PersonController();
$filmCtrl  = new MovieController() ;
$genreCtrl = new GenreController();
$roleCtrl = new RoleController();

//l'index va intercepter le requete HTPP et va orienter  vers le bon controlleur et la bonne méthode
  //

//ex:index.php?ctrl=movie&action=listFilms//

if(isset($_GET['action'])) {

    $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    switch($_GET['action']) {
        case "listFilms": $filmCtrl->findAllFilms(); break;
        case "listFilm": $filmCtrl->findGenre();break;
        case "listActors": $personCtrl->findAllActors(); break;
        case "listDirectors": $personCtrl->findAllDirectors(); break;
        case "listGenres": $genreCtrl->findAllGenres(); break;
        case "listRoles": $roleCtrl->findAllRoles(); break;
        case "detailFilm":$filmCtrl->findOneFilm($id);break;
        case "cardActor":$personCtrl->findOneActor($id);break;
        case "addActorForm":$personCtrl->addActorForm();break;
        case "addActor":$personCtrl->addPerson();break;
        case "cardDirector":$personCtrl->findOneDirector($id);break;
        case "addFilmForm":$filmCtrl->addFilmForm();break;
        case "addFilm":$filmCtrl->addFilm();break;
        case"deleteFilmById":$filmCtrl->deleteFilmById($id);break;

    default:
        $homeCtrl->homePage(); 
    
}}else {

    $homeCtrl->homePage();
}

?>


<!-----temporasitaion de sortie --->