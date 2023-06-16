<?php

ob_start()
?>
<div id="card_actors"  >
<h2>Details réalisateur</h2>

<?php
while ($director = $directors->fetch()) {

    echo "<p>Prénom  : {$director["prenom"]}</p>";

    echo "<p>Nom: {$director["nom"]}</p>";

    echo "<p>Sexe : {$director["sexe"]}</p>";

    echo "<p>Date de naissance : {$director["date_naissance"]}</p>";


}
?>

<?php
$title = "Details réalisateur";
$content =ob_get_clean();
require "views/template.php"
?>
</div>