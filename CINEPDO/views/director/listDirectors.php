<?php

ob_start()
?>
<div id="list_realisateurs">

<h2>Liste des réalisateurs</h2>

<?= $directors->rowcount() ?>

<?php
while ($director = $directors->fetch()) {

    echo "<p>Prénom du Réalisateur : {$director["prenom"]}</p>";

    echo "<p>Nom du Réalisateur : {$director["nom"]}</p>";

    //echo "<p>Sexe : {$director["sexe"]}</p>";

    //echo "<p>Date de naissance : {$director["date_naissance"]}</p>";

?>
<a class="btn btn-outline-primary"  href="index.php?action=cardDirector&id=<?=$director['id_realisateur']?>">Detail Réalisateur</a>
<?php
}

?>

<?php
$title = "liste des realisateurs";
$content =ob_get_clean();
require "views/template.php"


?>

</div>