<?php
ob_start();
// démarre la temporisation de sortie
?>


<h2>Liste des roles</h2>

<?= $roles->rowcount() ?>

<?php
while ($role = $roles->fetch()) {

    echo $role["id_role"];

    echo $role["nom_personnage"];

?>
    <a href="index.php?action=detailGenre&id=<?=$role['id_role']?>">Detail rôle</a>
<?php
}

?>

<?php

$title = "Liste des roles "; 
$content = ob_get_clean();
require "views/template.php"
?>