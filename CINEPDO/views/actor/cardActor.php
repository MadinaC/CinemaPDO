<?php

ob_start()
?>
<div id="content_actors"  >
<h2>Details acteur</h2>

<?php
while ($actor = $actors->fetch()) {

    echo "<p>Prénom de l'acteur : {$actor["prenom"]}</p>";

    echo "<p>Nom de l'acteur : {$actor["nom"]}</p>";

    echo "<p>Sexe : {$actor["sexe"]}</p>";

    echo "<p>Date de naissance : {$actor["date_naissance"]}</p>";

}

?>

<?php
$title = "Details acteur";
$content = ob_get_clean();
require "views/template.php"
?>
</div>

