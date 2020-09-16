<?php

class RequestController
{
  public static function execute($request, $input_list = null)
  {
    if ($request === 'first_load')
    {
      unset($_SESSION['category']);
      unset($_SESSION['price']);
      unset($_SESSION['purchase_date']);
      unset($_SESSION['warrant_limit']);
      $user = (new UserModel)->get_logged_user();
      if (empty($user) === TRUE)
      {
        LoginView::display();
      }
      else
      {
        $product_list = (new ProductModel)->get_all_product_of($user['username'], 10, 0);
        $product_count = (new ProductModel)->count_all_product_of($user['username']);
        $order = 'none';

        $user = (new UserModel)->get_logged_user();
        $categories = (new ProductModel)->fetch_column_distinct($user['username'], 'category');

        HomeView::display($user, $product_list, $product_count, $categories, $order);
      }
    }
    else if ($request === 'load_signup')
    {
      ob_start();
      SignupView::display();
      $response['body'] = ob_get_contents();
      ob_clean();
    }
    else if ($request === 'load_login')
    {
      ob_start();
      LoginView::display();
      $response['body'] = ob_get_contents();
      ob_clean();
    }
    else if ($request === 'signup')
    {
      $response = UserController::signup($input_list);
    }
    else if ($request === 'login')
    {
      $response = SessionController::login($input_list);
    }
    else if ($request === 'logout')
    {
      $response = SessionController::logout($input_list);
    }
    else if ($request === 'product_table_page')
    {
      $response = ProductTableController::display($input_list);
    }
    else if ($request === 'get_data')
    {
      $user = (new UserModel)->get_logged_user();

      $data = (new ProductModel)->fetch_column($user['username'], 'price', 'category');
      $response['data'] = $data;
      $categories = (new ProductModel)->fetch_column($user['username'], 'category');
      $response['categories'] = $categories;
    }
    else
    {
      echo "Probleme";
    }

    if (isset($response) === TRUE)
    {
      echo json_encode($response);
    }
  }
}
