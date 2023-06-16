<?php
ob_start();
// démarre la temporisation de sortie
?>
 <div id="detail_film">
    <?php
    if ($film = $film->fetch()) {
        echo "<p class='h3'>Genre:";
        while ($genre = $genres->fetch()) {

            echo "{$genre["nom_genre"]}  ";
            }
         while ($casting = $castings->fetch()) {
                echo   "{$casting["prenom"]}  {$casting["nom"]} ";
             }

            
        

        echo "</p>
        <p class='h3'>Titre du Film : {$film["titre"]}</p>;
        
        <img  class='affiche' src='./public/images/{$film["affiche"]}'>
        <p class='h4'>{$film["dateSortie"]}</p>
        <p class='h5'>Durée : {$film["t_hours"]}</p>
        <p>Note : {$film["note"]}/5</p>
        <p>Synopsis :</p> <p class='synopsis'>{$film["synopsis"]}</p>";

        ?>
        <a href="index.php?action=cardDirector&id=<?=$director['id_realisateur']?>"><?= $film['nom_prenom']?></a>
    <?php

 
    }
    
    ?>




<?php
 
$content = ob_get_clean();
require "views/template.php";
?>