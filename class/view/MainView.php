<?php

class MainView
{
  public static function accueil($product_list)
  {
    ?>
    <div class="d-flex flex-wrap"style="justify-content:center">
    <?php
    foreach ($product_list as $product) {
       ProductView::card($product);
    }
    ?>
    </div>
    <?php
  }

  public static function recherche()
  {

  }

  public static function detail($product)
  {
    ProductView::detail($product);
  }

  public static function signup()
  {
    ?>
    <div id="signup_view" class="w-100">
      <?php
      FormView::signup_form();
       ?>
    </div>
    <?php
  }
}
