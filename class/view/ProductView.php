<?php

class ProductView
{
  public static function single_view($product)
  {

  }

  public static function list_view($product)
  {

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
