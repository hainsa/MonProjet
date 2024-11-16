<?php
require_once 'Models/ProductService.php';
require_once 'Models/FileService.php';

class ProductController
{

    private $productService;

    private $fileService;

    function __construct(ProductService $ps)
    {
        $this->productService = $ps;
        $this->fileService = new FileService();
    }

    function afficherlisteProduct()
    {
        $listeProduct = $this->productService->getProduct();
        require_once 'Views/affichageProduct.php';
    }

    function afficherAjoutProduct()
    {
        $product = null;
        require_once 'Views/ajoutProduct.php';
    }

    function saveProduct()
    {
        $imageName = $this->fileService->saveFile();
        $id = $this->productService->insertProduct($imageName);
        return   ['id' => $id, 'nomFichier' => $imageName];
    }
    function majProduct()
    {
        $imageName = $this->fileService->saveFile();

        $this->productService->updateProductById($imageName);
        // header('location:'."http://localhost/MonProjet/index.php");
        echo ($imageName);
    }

    function supprimerProduct()
    {
        $this->productService->deleteProduct();
        header('location:' . "http://localhost/MonProjet/index.php");
    }

    function modifierProdut()
    {
        $product = $this->productService->getproductById();
        require_once 'Views/ajoutProduct.view.php';
    }
    function searchProduct(){
       $listProduct = $this->productService->getProductByKeyWord($_POST['motCle']);
        echo json_encode($listProduct);
    }
}
