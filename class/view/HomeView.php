<?php

class HomeView
{
  public static function display($user, $product_list)
  {
    ?>
    <button class="position-absolute btn btn-primary ml-2 mt-2" onclick="ajax(request('logout'))">Logout</button>
    <h1 class="text-center">Welcome <?= $user['username'] ?></h1>

    <?php

    

    ProductView::table($product_list);
  }
}
