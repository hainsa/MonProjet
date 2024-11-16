<?php
ob_start();
?>

<form action="index.php?page=save&&amp,id=<?= $product === null ? '' : $product->getId() ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">nom :</label>
        <input type="text" class="form-control" placeholder="nom" name="nom" value="<?= $product === null ? '' : $product->getnom() ?>">
    </div>
    <div class="form-group">
        <label for="">prix :</label>
        <input type="text" class="form-control" placeholder="prix" name="prix" value="<?= $product === null ? '' : $product->getprix() ?>">
    </div>
    <div class="form-group">
        <label for="">ref :</label>
        <input type="text" class="form-control" placeholder="ref" name="ref" value="<?= $product === null ? '' : $product->getref() ?>">
    </div>
    <div class="form-group">
        <label for="">Img :</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>


    <button class="btn btn-primary" type="submit">Save</button>
</form>


<?php

$content = ob_get_clean();
require_once 'Views/template.php';

?>