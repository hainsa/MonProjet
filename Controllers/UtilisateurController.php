<?php
require_once 'Models/UtilisateurService.php';
class UtilisateurController
{
    private $utilisateurService;
    function __construct()
    {
        $this->utilisateurService = new UtilisateurService();
    }
    function saveUtilisateur()
    {

        if ($_POST['pwd'] === $_POST['pwdConf']) {
            $mdpCrypte = crypt($_POST['pwd'], "salt");
            $this->utilisateurService->saveUser($mdpCrypte);
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['pwd'] = $mdpCrypte;
            header('location:http://localhost/MonProjet');
        } else {
            header('location:http://localhost/MonProjet/index.php?page=inscription');
        }
    }
    function authentificationUtilisateur()

    {
        $mdpCrypte = crypt($_POST['pwd'], "salt");
        if ($this->utilisateurService->getUser($mdpCrypte) == null) {
            header('location:http://localhost/MonProjet/index.php?page=connexion');
        } else {

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['pwd'] = $mdpCrypte;
            header('location:http://localhost/MonProjet/');
        }
    }
    function deconnecterUtilisateur()
    {
        session_destroy();
        header('location:http://localhost/MonProjet/');
    }
}
