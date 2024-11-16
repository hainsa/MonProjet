<?php

require_once 'Controllers/ProductController.php';
require_once 'Controllers/UtilisateurController.php';
require_once 'Models/FileService.php';

$url = isset($_SERVER['HTTPS']) ? "https" : "http";
$url =  $url . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
define('URL', str_replace("index.php", "", $url));


$productController = new ProductController(new ProductService());
$utilisateurController = new UtilisateurController();


if (isset($_SESSION['email']) && isset($_SESSION['pwd'])) {


    if (!isset($_GET['page'])) {
        $productController->afficherlisteProduct();
    } elseif ($_GET['page'] === 'ajout') {
        $productController->afficherAjoutProduct();
    } elseif ($_GET['page'] === 'save') {
        if ($_GET['id'] === '') {
            $productController->saveProduct();
        } else {
            $productController->majProduct();
        }
    } elseif ($_GET['page'] === 'delete' && $_GET['id'] != '') {
        $productController->supprimerProduct();
    } elseif ($_GET['page'] === 'modify' && $_GET['id'] != '') {
        $productController->modifierProdut();
    } elseif ($_GET["page"] === 'dataFromAjax') {
        // echo $_POST["auteurs"]."".$_POST["titres"]."".$_POST["pages"];
        // echo $modifierProdutController->saveLivre();
        if (!isset($_POST['id'])) {

            $data = $productController->saveProduct();

            header('Content-Type: application/json');

            echo json_encode($data);
        } else {
            $productController->majProduct();
        }
    } else if ($_GET['page'] === "deconnection") {
        $utilisateurController->deconnecterUtilisateur();
    } elseif ($_GET['page'] == "search") {

        $productController->searchProduct();
    }
} elseif (isset($_GET['page'])) {
    if ($_GET['page'] === "connexion")
        require_once "Views/connexion.php";
    elseif ($_GET['page'] === "inscription")
        require_once "Views/inscription.php";
    elseif ($_GET['page'] === "authentification")
        $utilisateurController->authentificationUtilisateur();
    elseif ($_GET['page'] === "saveInscription")
        $utilisateurController->saveUtilisateur();
} else {
    require_once "Views/accueil.php";
}
