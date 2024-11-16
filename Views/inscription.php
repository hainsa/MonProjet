<?php
ob_start();
?>
<div class="inscription">
    <div class="inscription1">
        <form action="index.php?page=saveInscription" method="post" class="form-group">
            <div class="form-group">
                <label for="">Nom utilisateurs:</label>
                <input type="text" class="form-control" placeholder="Entrer votre nom" name="nom">
            </div>
            <div class="form-group">
                <label for="">Email :</label>
                <input type="email" class="form-control" placeholder="Entrer votre email" name="email">
            </div>
            <div class="form-group">
                <label for="">Password :</label>
                <input type="password" class="form-control" placeholder="Entrer votre mot de passe" name="pwd">
            </div>
            <div class="form-group">
                <label for="">Confirm Password :</label>
                <input type="password" class="form-control" placeholder="Confirmer votre mot de passe" name="pwdConf">
            </div>
 
            <div>
                <button class="btn btn-success" type="submit">Save</button>

            </div>

        </form>
    </div>

</div>

<?php

$content = ob_get_clean();
require_once 'Views/template.php';

?>