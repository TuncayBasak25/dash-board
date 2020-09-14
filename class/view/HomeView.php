<?php

class HomeView
{
  public static function display($user, $product_list, $product_count)
  {
    ?>
    <button class="position-absolute btn btn-primary ml-2 mt-2" onclick="ajax(request('logout'))">Logout</button>
    <h1 class="text-center">Welcome <?= $user['username'] ?></h1>

    <div id="product_table" class="container">
      <?= ProductView::table($product_list, $product_count) ?>
    </div>
    <?php
  }
}
