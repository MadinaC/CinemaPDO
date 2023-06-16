<?php
ob_start();
?>

<div id="delete_film">
    <h3>Supprimer un film</h3>
</div>

<?php
$title = "Liste des acteurs "; 
$content = ob_get_clean();
require "views/template.php"
?>