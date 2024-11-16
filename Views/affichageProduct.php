<?php
ob_start();
?>

<a href="index.php?page=deconnection">Se deconnecter</a>
<input type="text" name="search" id="search">
<table class="table table-dark table-striped">
  <thead>
    <th>Id</th>
    <th>Nom</th>
    <th>Prix</th>
    <th>Références</th>
    <th>Images</th>
    <th>Actions</th>


  </thead>
  <tbody>
    <?php foreach ($listeProducts as $product) : ?>
      <tr id="<?= $product->getId() ?>">
        <td><?= $product->getid() ?></td>
        <td><?= $product->genom() ?></td>
        <td><?= $product->getprix() ?></td>
        <td><?= $product->getref() ?></td>



        <td><a class="btn btn-primary" href="index.php?page=delete&amp;id=<?= $product->getId() ?>">Supprimer</a>
          <button class="btn btn-warning modifier" data-toggle="modal" data-target="#myModal" data-id="<?= $product->getId() ?>" data-nom="<?= $product->getnom() ?>" data-prix="<?= $product->getpdrix() ?>" data-ref="<?= $product->getref() ?>">
            Modifier
          </button>
        </td>

      </tr>

    <?php endforeach ?>
  </tbody>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#">Logo</a>

    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link 3</a>
      </li>
    </ul>
  </nav>


</table>

<div class="container">
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
    Ajout product
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un produit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="index.php?page=save&amp;id=<?= $product === null ? '' : $product->getId() ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Nom :</label>
              <input type="text" class="form-control" placeholder="Nom" name="nom" id="nom">
            </div>
            <div class="form-group">
              <label for="">Prix :</label>
              <input type="text" class="form-control" placeholder="Prix" name="prix" id="prix">
            </div>
            <div class="form-group">
              <label for="">Références :</label>
              <input type="text" class="form-control" placeholder="Références" name="ref" id="ref">
            </div>
            <div class="form-group">
              <label for="">Image :</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-primary" id="save" type="submit" data-dismiss="modal">Save</button>
        </div>

      </div>
    </div>
  </div>

</div>


<?php
$content = ob_get_clean();
require_once 'Views/template.php';
?>