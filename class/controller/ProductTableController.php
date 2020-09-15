<?php

class ProductTableController
{
  public static function display($input_list)
  {
    $user = (new UserModel)->get_logged_user();

    $current_page = intval($input_list['page']);
    $product_per_page = intval($input_list['max']);

    $offset = ($current_page - 1) * $product_per_page;

    $order = 'none';
    if (isset($input_list['order']) === TRUE)
    {
      $order = $input_list['order'];
    }

    $category = 'all';
    if (isset($input_list['category']) === TRUE)
    {
      $category = $input_list['category'];
      $_SESSION['category'] = $category;
    }
    else if (isset($_SESSION['category']) === TRUE)
    {
      $category = $_SESSION['category'];
    }


    $product_list = (new ProductModel)->get_all_product_of($user['username'], $product_per_page, $offset, $order, $category);
    $product_count = (new ProductModel)->count_all_product_of($user['username'], $category);

    ob_start();
    ProductView::table($product_list, $product_count, $current_page, $product_per_page, $order);
    $response['product_table'] = ob_get_contents();
    ob_clean();

    return $response;
  }
}
