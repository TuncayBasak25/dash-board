<?php

class ProductView{

  public static function card($product){
    ?>
    <div class="card m-5 product-link" style=cursor:pointer onclick="ajax(request('product_detail', 'reference=<?= $product['product_name'] ?>'))">
      <h6 class="card-title" style="text-align:center"><?= $product['product_name'] ?></h6>
      <img style="width: 250px" class="card-img-top img-card" src="data:image/jpeg;base64,<?= base64_encode($product['product_image']) ?> " height="" width="" alt="mon image" title="image"/>
      <div class="card-body">
        <p class="price"><?= $product['price'] ?>€</p>
      </div>
    </div>
    <?php
  }
  public static function detail($product){
    ?>
    <div class="container">
      <div class="row my-5">
        <div class="col-md">
          <h2><?= $product['product_name']; ?></h2>
            <img style="max-width: 500px" class="" src="data:image/jpeg;base64,<?= base64_encode($product['product_image']) ?> " height="" width="" alt="mon image" title="image"/>
        </div>
        <div class="col-sm-4">
          <br>
          <br>
          <br>
          <h3>PRIX :<br>
            <?= $product['price']; ?>€
          </h3>
          <input type="number" name="" value="1">
          <button class="btn btn-outline-light bg-success my-2 my-sm-0 order-button"><img src="./img/buy.png"></button>
          <p>Nom du produit: <?= $product['product_name']; ?></p>
          <p>Référence: <?= $product['ref']; ?></p>
          <p>Catégorie: <?= $product['category']; ?></p>
          <p>Garantie: 1 ans</p>
        </div>
      </div>
      <div class="col">
        <h3>Manuel d'utilisateur</h3>
        <?= $product['owner_manual'];?>
      </div>
    </div>
    <?php
    }

  }
