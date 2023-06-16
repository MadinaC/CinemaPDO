<?php
ob_start();
?>

<div id="card_actors"  >
        <div class="d-inline-flex p-2">
            <a class="btn btn-primary btn-lg active" href=./index.php>Retour</a>
        </div>    
    <form action="index.php?action=addFilm" method="post">
                    <p>
                        <label class="accueil__label label" for="titre">
                            Titre:
                            <input class="form-control form-control-lg"  type="text" name="title">
                        </label>
                    </p>
                    <p>
                        <label class="accueil__label label">
                            Date de sortie:
                            <input class="form-control form-control-lg"  type="date"  name="release_date" >
                        </label> 
                    </p>
                    <p>
                        <label class="accuel__label label">
                            Durée:
                            <input class="form-control form-control-lg" type="number" name="duration"  min="0" max= "500">
                        </label>
                    </p>
                    <p>
                        <label class="accuel__label label">
                         Réalisateur:
                            <select   class="form-select form-select-lg mb-3" name="director" size= "1">
                                <?php
                                    while ($nameDirector= $listDirectors->fetch()){
                                 echo "<option value =".$nameDirector['id_realisateur'].">".$nameDirector['RealNom']."</option>";
                                        }
                                ?>
                            </select>
                        </label >                         
                    </p>
                    <p>
                            <label class="accuel__label label">
                        Synopsis:
                        <textarea class="form-control" name="synopsis" placeholder="Synopsis"></textarea>
                    </label>
                    </p>
                    <p>
                        <label class="accuel__label label">
                            Note:
                            <input class="form-control form-control-lg"   type="number" name="note" min="0" max="5" step="0.1" placeholder="0" required >
                        </label>
                    </p>
                    <p>
                        <label class="accuel__label label">
                            Affiche:
                            <input class="form-control form-control-lg"  name="poster" type="file"/>
                        </label>
                    </p>
                    <p>
                    <label class="accuel__label label">
                         Génre:
                        <select class="form-select form-select-lg mb-3"  name="genref[]" multiple  required>
                            <?php
                               while ($nameGenre=$listGenres->fetch()){
                                echo "<option value =".$nameGenre['id_genre'].">".$nameGenre['nom_genre']."</option>";
                               }
                               ?>
                       </select>
                    </label >                         
                    </p>
                    <p>
                        <input  class="btn btn-primary btn-lg active" type="submit" name="submit" value="Ajouter un film">
                    </p>
                   

                
        </form>
</div>
<?php
$title = "Formulaire d'ajout d'un acteur";
$content = ob_get_clean();
require "views/template.php"
?>