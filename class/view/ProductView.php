<?php

class ProductView
{
  public static function single_view($product)
  {

  }

  public static function table($product_list, $product_count, $current_page = 1, $product_per_page = 20)
  {
    ?>
    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
    <?php

    ProductView::pagination($product_per_page, $product_count, $current_page);
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
      <td><?= $product['price'] ?> €</td>
      <td><?= $purchase_type_value ?></td>
      <td><?= explode(' ', $product['purchase_date'])[0] ?></td>
      <td><?= explode(' ', $product['warrant_limit'])[0] ?></td>
      <td><?= $manual ?></td>
    </tr>
    <?php
  }

  public static function pagination($product_per_page, $product_count, $current_page)
  {
    $last_page = ceil($product_count / $product_per_page);echo $last_page
    ?>
    <nav aria-label="...">
      <ul class="pagination">
        <?php
        if ($current_page === 1)
        {
          ?>
          <li class="page-item disabled">
            <span class="page-link">Previous</span>
          </li>
          <?php
        }
        else
        {
          ?>
          <li class="page-item">
            <button class="page-link" onclick="ajax(request('product_table_page', ['page=<?= $current_page - 1 ?>', 'max=<?= $product_per_page ?>']))">Previous</button>
          </li>
          <?php
        }

        for ($page=1; $page <= $last_page; $page++)
        {
          if ($page !== $current_page)
          {
            ?>
            <li class="page-item">
              <button class="page-link" onclick="ajax(request('product_table_page', ['page=<?= $page ?>', 'max=<?= $product_per_page ?>']))"><?= $page ?></button>
            </li>
            <?php
          }
          else
          {
            ?>
            <li class="page-item active">
              <span class="page-link"><?= $current_page ?><span class="sr-only">(current)</span></span>
            </li>
            <?php
          }
        }

        if ($current_page === $last_page)
        {
          ?>
          <li class="page-item disabled">
            <span class="page-link">NEXT</span>
          </li>
          <?php
        }
        else
        {
          ?>
          <li class="page-item">
            <button class="page-link" onclick="ajax(request('product_table_page', ['page=<?= $current_page + 1 ?>', 'max=<?= $product_per_page ?>']))">Next</button>
          </li>
          <?php
        }
        ?>
      </ul>
    </nav>
    <?php
  }
}
