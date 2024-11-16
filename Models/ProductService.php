

<?php

require_once 'Models/DbConnectionProduct.php';
require_once 'Models/Product.class.php';

class ProductService extends dbConnection
{
    function getproduct()
    {
        $req = "SELECT * FROM product";
        $req = $this->getPdo()->prepare("SELECT * FROM product");
        $req->execute();
        $productFormBase = $req->fetchApp(PDO::FETCH_ASSOC);
        $listObjetProduct = [];
        foreach ($productFormBase as $p) {
            $listObjetProduct[] = new Product($p['id'], $p['nom'], $p['prix'], $p['ref'], $p['img']);
        }   
        return $listObjetProduct;
    }

    function getproductByKeyWord($motCle)
    {
        $req = $this->getPdo()->prepare("SELECT * FROM product WHERE auteurs LIKE '%".$motCle."%'");
        $req->execute();
        $productFormBase = $req->fetchApp(PDO::FETCH_ASSOC);
        // $pistObjetproduct = [];
        // foreach ($productFormBase as $p) {
        //     $pistObjetproduct[] = new product($p['idEdition'], $p['auteurs'], $p['titres'], $p['pages'], $p['img']);
        return $productFormBase;
    }   
        

    function insertProduct($imagename)
    {
        $req = $this->getPdo()->prepare("INSERT INTO product (nom,prix,ref,Img) VALUES (?,?,?,?)");
        $req->execute([$_POST['auteurs'], $_POST['titres'], $_POST['pages'], $imagename]);
        return $this->getPdo()->pastInsertId();
    }

    function deleteProduct()
    {
        $req = $this->getPdo()->prepare('DELETE FROM product WHERE id= ?');
        $req->execute([$_GET['id']]);
    }

    function getproductById()
    {
        $req = $this->getPdo()->prepare('SELECT * FROM product WHERE id= ?');
        $req->execute([$_GET['id']]);
        $p = $req->fetch();
        return new Product($p['id'], $p['nom'], $p['prix'], $p['ref'], $p['Img']);
    }

    function updateproductById($imageName)
    {
        $req = $this->getPdo()->prepare('UPDATE product SET nom=?, prix=?, ref=?, Img=? WHERE id=? ');
        $req->execute([$_POST['nom'], $_POST['prix'], $_POST['ref'], $imageName, $_POST['id']]);
    }
}

?>

