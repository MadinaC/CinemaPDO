<?php
ob_start();
// démarre la temporisation de sortie
?>

<div id='list_genres'>
<h2>Liste des genres</h2>

<?= $genres->rowcount() ?>

<?php
while ($genre = $genres->fetch()) {

    echo "<p class='h3'>Titre:{$genre["nom_genre"]}</p>";
    

?>
    <a class="btn btn-outline-primary"href="index.php?action=detailGenre&id=<?=$genre['id_genre']?>">Detail Genre</a>
<?php
}

?>

<?php

$title = "Liste des genres "; 
$content = ob_get_clean();
require "views/template.php"
?>

</div>