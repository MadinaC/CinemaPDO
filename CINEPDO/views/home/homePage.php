<?php
 ob_start();//démarre la temporasition de sortie//
?>




<?php
  $title = "Cinema";
  $content = ob_get_clean();
  require "views/template.php";
?>