<?php

class ProductView
{
  public static function single_view($product)
  {

  }

  public static function table($product_list)
  {
    ?>

    <div class="container">
      <table id="product_table" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th class="th-sm">Name</th>
            <th class="th-sm">Category</th>
            <th class="th-sm">Price</th>
            <th class="th-sm">Purchased at</th>
            <th class="th-sm">Purchase date</th>
            <th class="th-sm">Warrant limit</th>
            <th class="th-sm">Manual</th>
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

  public static function row($product)
  {
    if ($product['purchase_type'] === 'web')
    {
      $purchase_type_value = $product['purchase_url'];
    }
    else
    {
      $purchase_type_value = $product['purchase_adress'];
    }

    if (empty($product['manual']) === FALSE)
    {
      $manual = 'YES';
    }
    else
    {
      $manual = 'NO';
    }
    ?>
    <tr>
      <th scope="row"><?= $product['name'] ?></th>
      <td><?= $product['category'] ?></td>
      <td><?= $product['price'] ?></td>
      <td><?= $purchase_type_value ?></td>
      <td><?= $product['purchase_date'] ?></td>
      <td><?= $product['warrant_limit'] ?></td>
      <td><?= $manual ?></td>
    </tr>
    <?php
  }
}
