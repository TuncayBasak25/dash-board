<?php

class HomeView
{
  public static function display($user, $product_list)
  {
    ?>
    <button class="position-absolute btn btn-primary ml-2 mt-2" onclick="ajax(request('logout'))">Logout</button>
    <h1 class="text-center">Welcome <?= $user['username'] ?></h1>

    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Purchased at</th>
            <th scope="col">Purchase date</th>
            <th scope="col">Warrant limit</th>
            <th scope="col">Manual</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($product_list as $product) {
            ProductView::row($product);
          }
           ?>
        </tbody>
      </table>
    </div>
    <?php
  }
}
