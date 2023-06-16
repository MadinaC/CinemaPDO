<?php

class MovieController {
   
    public function findAllFilms() {

        $dao = new DAO();

        $sql =  "SELECT f.id_film,f.titre,f.date_sortie,f.duree,f.synopsis,f.note FROM film f " ;

        $films = $dao->executerRequete($sql);

        require  "views/movie/listFilms.php";
    }

    public function findOneFilm($id) {

        $dao = new DAO();

        $sql = "SELECT
                    f.id_realisateur,
                    f.id_film,
                    f.titre,
                    f.affiche,
                    DATE_FORMAT(f.date_sortie, '%e %M %Y') AS dateSortie,
                    SEC_TO_TIME(f.duree*60) AS t_hours,
                    f.note,
                    f.synopsis,
                    CONCAT(p.prenom,' ', p.nom) AS nom_prenom
                FROM film f
                LEFT JOIN realisateur re ON re.id_realisateur = f.id_realisateur
                LEFT JOIN personne p ON p.id_personne = re.id_personne
                WHERE f.id_film =:id_film;";

        $film = $dao->executerRequete($sql,[":id_film"=>$id]);


        $sql2 = "SELECT 
        ap.id_film,
        g.nom_genre

FROM appartenir ap
INNER JOIN genre g ON
        g.id_genre= ap.id_genre
WHERE ap.id_film =:id_film;";

$genres= $dao->executerRequete($sql2,[":id_film"=>$id]); 

        // $casting = $dao->executerRequete($sql,[":id_film"=>$id]);
    $sql3 = "SELECT
     f.id_film,
     f.titre,
     p.nom,
     p.prenom,
     p.sexe,
     c.id_role,
     ro.nom_personnage

FROM casting c
INNER JOIN role ro ON
    c.id_role = ro.id_role
INNER JOIN film f ON
    f.id_film = c.id_film
INNER JOIN acteur a ON
     a.id_acteur = c.id_acteur
INNER JOIN personne p ON
      p.id_personne = a.id_personne
   
    WHERE c.id_film= :id";

    $castings=$dao->executerRequete($sql3,["id"=>$id]);

require "views/movie/detailFilm.php";   
}

public function addFilmForm() {
    $dao = new DAO;
    $sql8 = "SELECT DISTINCT(CONCAT (nom,' ',prenom)) AS 'RealNom',
                r.id_realisateur
    FROM 
     realisateur r
    INNER JOIN personne  p ON
      p.id_personne= r.id_personne";

$listDirectors = $dao->executerRequete($sql8);
    
    
    $sql9 = "SELECT id_genre,nom_genre FROM genre";
                        
    $listGenres = $dao->executerRequete($sql9);

    require "views/movie/addFilmForm.php";
}


public function addFilm() {

        $dao = new DAO;

        $sql7 = "INSERT INTO film (titre,date_sortie,duree,id_realisateur,synopsis,note,affiche)VALUES
            (:titre,:sortie,:duree,:id_realisateur,:synopsis,:note,:poster)";

//var_dump($_POST['genref']);
    
    $title = filter_input(INPUT_POST,"title",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $release_date = filter_input(INPUT_POST,"release_date",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $duration = filter_input(INPUT_POST,"duration",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id_director = filter_input(INPUT_POST,"director",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $synopsis = filter_input(INPUT_POST,"synopsis",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $note = filter_input(INPUT_POST,"note",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $poster = filter_input(INPUT_POST, "poster", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $genres = [];
    foreach ($_POST['genref'] as $idGenre) {
        $genres[] = filter_var($idGenre, FILTER_SANITIZE_NUMBER_INT);
    }

    //var_dump($genres);
    


  
     $dao->executerRequete($sql7,[":titre" => $title,":sortie" => $release_date,":duree" =>$duration,":id_realisateur"=>$id_director,":synopsis" =>$synopsis,":note"=>$note,":poster"=>$poster]);
     //pour ajouter les genres qui est la table associative ,il nous faut l'id_film .On récupere id_film grace à une fonction native)
     $lastIdFilm = $dao->getBDD()->lastInsertId();
     $sql10 = "INSERT INTO appartenir (id_film,id_genre) VALUES (:id_film,:id_genre)";
     
     foreach ($genres as $genreFilm) {
        $addGenres = $dao->executerRequete($sql10,[":id_film"=>$lastIdFilm,":id_genre"=>$genreFilm]);
     }
    
     
    $this->findAllFilms();

}

public function deleteFilmById($id){
        $dao = new DAO;
        $sql11 = "DELETE  FROM casting
        WHERE id_film=:id";
        $sql12 = "DELETE FROM  appartenir
        WHERE id_film = :id";
        $sql13 ="DELETE FROM film
        WHERE id_fim=:id";
                   

}
    
}
    //public function aadFilm($array) {
        ///$dao = new DAO();
       // $sql = "INSERT INTO film (titre,date_sortie,duree,synopsis,note,affiche)VALUES
        //("titre","date sortie","duree","synopsis","note","affiche")







?>