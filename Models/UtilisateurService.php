<?php
require_once 'DbConnectionProduct.php';

class UtilisateurService extends DbConnection {

    function getUser($pwd) {
        $utl = $this->getPdo()->prepare('SELECT * FROM user WHERE email = ? AND pwd = ? ');
        $utl->execute([$_POST['email'], $pwd]);
        return $utl->fetch();
    }

    function saveUser($pwd)
    {
        $req = $this->getPdo()->prepare('INSERT INTO user (nom, email, pwd) VALUES (?,?,?)');
        $req->execute([$_POST['nom'], $_POST['email'], $pwd]);
    }
}