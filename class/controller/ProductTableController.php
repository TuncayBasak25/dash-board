<?php

class ProductTableController
{
  public static function display($input_list)
  {
    $user = (new UserModel)->get_logged_user();

    $current_page = intval($input_list['page']);
    $product_per_page = intval($input_list['max']);

    $offset = ($current_page - 1) * $product_per_page;

    if (isset($input_list['new_product_per_page']) === TRUE && $input_list['new_product_per_page'] !== 'none')
    {
      $product_per_page = intval($input_list['new_product_per_page']);
      $_SESSION['product_per_page'] = $product_per_page;
    }
    else if (isset($_SESSION['product_per_page']) === TRUE)
    {
      $product_per_page = intval($_SESSION['product_per_page']);
    }

    $order = 'none';
    if (isset($input_list['order']) === TRUE)
    {
      $order = $input_list['order'];
    }

    $category = 'all';
    if (isset($input_list['category']) === TRUE && $input_list['category'] !== 'all')
    {
      $category = $input_list['category'];
      $_SESSION['category'] = $category;
    }
    else if (isset($_SESSION['category']) === TRUE)
    {
      $category = $_SESSION['category'];
    }

    $price = 'all';
    if (isset($input_list['price']) === TRUE && $input_list['price'] !== 'all')
    {
      $price = $input_list['price'];
      $_SESSION['price'] = $price;
    }
    else if (isset($_SESSION['price']) === TRUE)
    {
      $price = $_SESSION['price'];
    }

    $purchase_type = 'all';
    if (isset($input_list['purchase_type']) === TRUE && $input_list['purchase_type'] !== 'all')
    {
      $purchase_type = $input_list['purchase_type'];
      $_SESSION['purchase_type'] = $purchase_type;
    }
    else if (isset($_SESSION['purchase_type']) === TRUE)
    {
      $purchase_type = $_SESSION['purchase_type'];
    }

    $warrant_limit = 'all';
    if (isset($input_list['warrant_limit']) === TRUE && $input_list['warrant_limit'] !== 'all')
    {
      $warrant_limit = $input_list['warrant_limit'];
      $_SESSION['warrant_limit'] = $warrant_limit;
    }
    else if (isset($_SESSION['warrant_limit']) === TRUE)
    {
      $warrant_limit = $_SESSION['warrant_limit'];
    }


    $product_list = (new ProductModel)->get_all_product_of($user['username'], $product_per_page, $offset, $order, $category, $price, $purchase_type, $warrant_limit);
    $product_count = (new ProductModel)->count_all_product_of($user['username'], $category, $price, $purchase_type, $warrant_limit);

    $data = (new ProductModel)->fetch_column('price');
    $response['data'] = $data;
    $label = (new ProductModel)->fetch_column('name');
    $response['label'] = $label;

    ob_start();
    ProductView::table($product_list, $product_count, $current_page, $product_per_page, $order);
    $response['product_table'] = ob_get_contents();
    ob_clean();

    return $response;
  }
}
