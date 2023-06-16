<?php

class PersonController {

       
        public function findAllActors() {

            $dao = new DAO();

            $sql = "SELECT
                    ac.id_acteur,
                    p.id_personne,
                    p.prenom,
                    p.nom,
                    p.sexe,
                    p.date_naissance
                FROM
                    personne p
                INNER JOIN acteur ac ON ac.id_personne = p.id_personne";

        $actors = $dao->executerRequete($sql);


    
            require  "views/actor/listActors.php";
        }

        public function findAllDirectors() {

            $dao = new DAO();

            $sql = "SELECT
                        p.id_personne, re.id_realisateur,
                        p.prenom,
                        p.nom,
                        p.sexe,
                        p.date_naissance
                    FROM
                        personne p
                    INNER JOIN realisateur re ON re.id_personne = p.id_personne";
    
            $directors = $dao->executerRequete($sql);

            require "views/director/listDirectors.php";
        }

        public function findOneDirector($id)  {

            $dao = new DAO();
    
            $sql = "SELECT
                        re.id_realisateur,
                        p.prenom,
                        p.nom,
                        p.sexe,
                        p.date_naissance
                    FROM
                        realisateur re

                    INNER JOIN personne p ON p.id_personne = re.id_personne
                    WHERE re.id_realisateur = :id;";
    
            $directors = $dao->executerRequete($sql,[":id"=>$id]);
    
            //$films = MovieController::getInstance()->getFilmsByDirectorId($id);//
    
            require "views/director/cardDirector.php";
        }
        public function findOneActor($id)  {

            $dao = new DAO();
    
            $sql4 = "SELECT
            ac.id_acteur,
            p.prenom,
            p.nom,
            p.sexe,
            p.date_naissance
        FROM
            acteur ac
        INNER JOIN personne p ON p.id_personne = ac.id_personne
        WHERE ac.id_acteur = :id;";

            
    
            $actors = $dao->executerRequete($sql4,[":id"=>$id]);
    
            //$films = MovieController::getInstance()->getFilmsByDirectorId($id);//
    
            require "views/actor/cardActor.php";
        }

        public function addActorForm() {
            

require "views/actor/addActorForm.php";
        }

        public function addPerson() {

            $dao = new DAO;

            $sql5 = "INSERT INTO personne  (nom,prenom,sexe,date_naissance)VALUES
                (:nom,:prenom,:sexe,:date_naissance)";
        
        $lastname = filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $firstname = filter_input(INPUT_POST,"firstname",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sex = filter_input(INPUT_POST,"sex",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $date_birth= filter_input(INPUT_POST,"date_birth",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

         $dao->executerRequete($sql5,[":nom"=>$lastname,":prenom"=>$firstname,":sexe"=>$sex,":date_naissance"=>$date_birth]);
       
        
        $this->findAllActors();
        $lastId = $dao->getBDD()->lastInsertId();

        $sql6 = "INSERT INTO acteur (id_personne)VALUES
             (:id_personne)";

        $dao->executerRequete($sql6,[":id_personne"=>$lastId]);
        }

        


        
        
    }
      

?>


