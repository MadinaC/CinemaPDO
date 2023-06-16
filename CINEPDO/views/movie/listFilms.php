<?php
ob_start()
?>
     
<div id="content_films">
<a  class="btn btn-warning" href ="index.php?action=addFilmForm" >Ajouter un film

     </a> 
    <?= $films->rowCount() ; ?>
<!--------je vais devoir fectchALL---->
<?php

while($film =$films->fetch()) {

   // echo $film["id_film"];
    echo "<p class='h3'>Titre:{$film["titre"]}</p>";

   // echo $film["date_sortie"];
   // echo $film["duree"];
   // echo $film["synopsis"];
    //echo $film["note"];
    ?>
    <a class="btn btn-outline-primary"  href="index.php?action=detailFilm&id=<?=$film['id_film']?>">Details</a>
    <a class="btn btn-outline-primary"  href="index.php?action=deleteFilmById&id=<?=$film['id_film']?>">Supprimer</a>
<?php
}

?>


<?php
$title = "liste des films";
$content =ob_get_clean();
require "views/template.php"

?>

</div>

   
