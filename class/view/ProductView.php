<?php

class ProductView{

  public static function card(){
    ?>
    <div class="card m-5" style="cursor: pointer" onclick="ajax(request('product_detail', 'reference=galaxyNote20Ultra'))">
      <h6 class="card-title" style="text-align:center">Galaxy Note 20 Ultra</h6>
      <img class="w-100 card-img-top img-card" src="img/image.jpeg" height="" width="" alt="mon image" title="image"/>
      <div class="card-body">
        <p class="price">1309€</p>
      </div>
    </div>
    <?php
  }
  public static function detail($reference){
    ?>
    <div class="row my-5">
      <div class="col-md">
        <h2>Galaxy Note 20 Ultra</h2>
          <img style="width: 500px" class="" src="img/image.jpeg" height="" width="" alt="mon image" title="image"/>
      </div>
      <div class="col-sm-4">
        <h3>PRIX :<br>
          1309€
        </h3>
        <input type="number" name="" value="1">
        <button class="btn btn-outline-light bg-success my-2 my-sm-0 order-button"><img src="./img/buy.png"></button>
        <p>Nom du produit: Galaxy Note 20 Ultra</p>
        <p>Référence: <?= $reference ?></p>
        <p>Catégorie: Smartphone</p>
        <p>Garantie: 1 ans</p>
      </div>
    </div>
    <div class="col">
      <h3>Manuel d'utilisateur</h3>
      Manual???
    </div>
    <?php
    FormView::acceuil_form();
    }

    public static function breadcrumb($product)
    {
      ?>
      <div class="w-100 d-flex align-items-center" style="height: 300px; background-color: red">
        <img src="img/image.jpeg" class="" style="object-fit: cover; width: 280px; height: 280px; margin-left: 10px;" alt="">
        <div class="flex-grow-1 text-center d-flex align-items-center justify-content-center" style="background-color: grey; height: 280px; margin-right: 10px;">
          <span>
            id: <?= $product['id'] ?> <br>
            name: <?= $product['name'] ?>
          </span>
        </div>
      </div>
      <?php
    }
  }
