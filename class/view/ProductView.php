<?php

class ProductView{

  public static function card(){
    ?>
    <div class="card m-5" style="cursor: pointer" onclick="ajax(request('product_detail_ref'), mainSectionResponse)">
      <h6 class="card-title" style="text-align:center">Galaxy Note 20 Ultra</h6>
      <img class="w-100 card-img-top img-card" src="img/image.jpeg" height="" width="" alt="mon image" title="image"/>
      <div class="card-body">
        <p class="price">1309€</p>
      </div>
    </div>
    <?php
  }
  public static function detail(){
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
        <p>Référence: Reference</p>
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
  }
