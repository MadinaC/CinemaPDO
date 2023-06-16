
<?php
ob_start();
?>

<div id="card_actors"  >
    <form action="index.php?action=addActor" method="post">
                    <p>
                        <label class="accueil__label label">
                            Nom du acteur:
                            <input class="form-control form-control-lg"  type="text" name="lastname">
                        </label>
                    </p>
                    <p>
                        <label class="accueil__label label">
                            Prenom du acteur:
                            <input class="form-control form-control-lg"  type="text" step="any" name="firstname">
                        </label> 
                    </p>
                    <p>
                        <label class="accuel__label label">
                            Sexe:
                            <input class="form-control form-control-lg" type="text" name="sex" >
                        </label>
                    </p>
                    <p>
                        <label class="accuel__label label">
                            Date de naissance:
                            <input class="form-control form-control-lg"   type="date" name="date_birth" >
                        </label>
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Ajouter un acteur">
                    </p>
                
        </form>
</div>

<?php
$title = "Formulaire d'ajout d'un acteur";
$content = ob_get_clean();
require "views/template.php"
?>