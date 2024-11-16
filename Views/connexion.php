<?php
ob_start();
?>

<div class="voaloa">
    <div class="conn">

        <form action="index.php?page=authentification" method="post" >
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" value="Connection">
            </div>
            <div>
                <button type="submit" class="btn btn-secondary">Save</button>

            </div>
        </form>

        <p>Pas de compte? Veuillez vous inscrir</p>

        <a href="index.php?page=inscription">inscription</a>

    </div>

</div>

<?php

$content = ob_get_clean();
require_once 'Views/template.php';

?>