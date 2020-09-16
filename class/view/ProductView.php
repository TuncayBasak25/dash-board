<?php

class ProductView
{
  public static function single_view($product)
  {

  }

  public static function table($product_list, $product_count, $current_page, $product_per_page, $categories, $order)
  {
    ?>
    <div class="input-group mb-3">
      <form id="product_table_page" onsubmit="formSubmit(this)" method="post"></form>
      <input type="hidden" form="product_table_page" name="page" value="1">
      <input type="hidden" form="product_table_page" name="max" value="<?= $product_per_page ?>">
      <input type="hidden" form="product_table_page" name="order" value="<?= $order ?>">

      <div class="col-3">
        <select name="category" form="product_table_page" class="custom-select">
          <option selected value="all">Category</option>
          <?php
          foreach ($categories as $category)
          {
            ?>
            <option value="<?= $category['category'] ?>"><?= ucfirst($category['category']) ?></option>
            <?php
          }
          ?>
        </select>
      </div>
      <div class="col-3">
        <select name="price" form="product_table_page" class="custom-select">
          <option selected value="all">Prix</option>
          <option value="< 50">&lsaquo; 50 €</option>
          <option value="> 50 AND price < 500">50 € - 500 €</option>
          <option value="> 500">&rsaquo; 500 €</option>
        </select>
      </div>
      <div class="col-3">
        <select name="purchase_type" form="product_table_page" class="custom-select">
          <option selected value="all">Purchase type</option>
          <option value="web">Web</option>
          <option value="physic">Physic</option>
        </select>
      </div>
      <?php
      $one_year = date('Y-m-d H:i:s', time() + 365 * 24 * 3600);
      $two_year = date('Y-m-d H:i:s', time() + 730 * 24 * 3600);
      ?>
      <div class="col-3">
        <select name="warrant_limit" form="product_table_page" class="custom-select cursor-pointer-select">
          <option class="cursor-pointer-select" selected value="all">Warrant limit</option>
          <option value="<= '<?= $one_year ?>'">Less than one year</option>
          <option value=">= '<?= $one_year ?>' AND warrant_limit <= '<?=$two_year ?>'">Between one and two year</option>
          <option value=">= '<?= $two_year ?>'">More than two year</option>
        </select>
      </div>
    </div>
    <div class="form-group d-flex justify-content-center align-items-center">
      <button class="form-control btn btn-primary col-4" form="product_table_page" type="submit" name="button">Appliquer les filtres</button>
      <div class="col-2">
        <select name="new_product_per_page" form="product_table_page" class="custom-select">
          <option selected value="none">Limit</option>
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="20">20</option>
        </select>
      </div>
    </div>

    <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
      <thead>
        <tr>
          <?php
          if ($order === 'name')
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=name DESC']))">Name</th>
            <?php
          }
          else
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=name']))">Name</th>
            <?php
          }
          if ($order === 'category')
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=category DESC']))">Category</th>
            <?php
          }
          else
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=category']))">Category</th>
            <?php
          }
          if ($order === 'price')
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=price DESC']))">Price</th>
            <?php
          }
          else
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=price']))">Price</th>
            <?php
          }
          if ($order === 'purchase_adress')
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=purchase_adress DESC']))">Purchased at</th>
            <?php
          }
          else
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=purchase_adress']))">Purchased at</th>
            <?php
          }
          if ($order === 'purchase_date')
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=purchase_date DESC']))">Purchase date</th>
            <?php
          }
          else
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=purchase_date']))">Purchase date</th>
            <?php
          }
          if ($order === 'warrant_limit')
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=warrant_limit DESC']))">Warrant limit</th>
            <?php
          }
          else
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=warrant_limit']))">Warrant limit</th>
            <?php
          }
          if ($order === 'manual')
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=manual DESC']))">Manual</th>
            <?php
          }
          else
          {
            ?>
            <th class="th-sm" style="cursor: pointer" onclick="ajax(request('product_table_page', ['page=1', 'max=<?= $product_per_page ?>', 'order=manual']))">Manual</th>
            <?php
          }
          ?>
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

    ProductView::pagination($product_per_page, $product_count, $current_page, $order);
    ?>

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
      <td><?= $product['price'] ?> €</td>
      <td><?= $purchase_type_value ?></td>
      <td><?= explode(' ', $product['purchase_date'])[0] ?></td>
      <td><?= explode(' ', $product['warrant_limit'])[0] ?></td>
      <td><?= $manual ?></td>
    </tr>
    <?php
  }

  public static function pagination($product_per_page, $product_count, $current_page, $order)
  {
    $last_page = intval(ceil($product_count / $product_per_page));
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
            <button class="page-link" onclick="ajax(request('product_table_page', ['page=<?= $current_page - 1 ?>', 'max=<?= $product_per_page ?>', 'order=<?= $order ?>']))">Previous</button>
          </li>
          <?php
        }

        for ($page=1; $page <= $last_page; $page++)
        {
          if ($page !== $current_page)
          {
            ?>
            <li class="page-item">
              <button class="page-link" onclick="ajax(request('product_table_page', ['page=<?= $page ?>', 'max=<?= $product_per_page ?>', 'order=<?= $order ?>']))"><?= $page ?></button>
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
            <button class="page-link" onclick="ajax(request('product_table_page', ['page=<?= $current_page + 1 ?>', 'max=<?= $product_per_page ?>', 'order=<?= $order ?>']))">Next</button>
          </li>
          <?php
        }
        ?>
      </ul>
    </nav>
    <?php
  }
}
