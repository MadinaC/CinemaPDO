<?php
ob_start();
// démarre la temporisation de sortie
?>


<h2>Liste des acteurs</h2
    
    
        <?= "<p>{$actors->rowcount()}</p>" ?>
        
        <a class="btn btn-outline-success" href ="index.php?action=addActorForm">Ajouter un acteur</a>
        <?php
        while ($actor = $actors->fetch()) {

            echo 
            "<p>{$actor["id_acteur"]}</p>
            <p>{$actor["prenom"]} {$actor["nom"]}</p>
            ";
        ?>

            <a class="btn btn-outline-primary" href="index.php?action=cardActor&id=<?=$actor['id_acteur']?>">
                Detail Acteur
            </a>
        <?php
        }
        ?>
          
            


                    

         
<?php



$title = "Liste des acteurs "; 
$content = ob_get_clean();
require "views/template.php"
?>
