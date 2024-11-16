<?php
ob_start();
?>

<div class="accueil">
    <div class="accueil-1">

        <h1>Nous sommes là pour vous servir</h1>

        <h7>Pour commencer appuyez sur start</h7>

        <a href="index.php?page=connexion" class="btn btn-primary">Start</a>

    </div>


</div>

<?php

$content = ob_get_clean();
require_once 'Views/template.php';

?>