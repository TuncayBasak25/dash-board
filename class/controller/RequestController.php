<?php

class RequestController
{
  public static function execute($request, $input_list = null)
  {
    if ($request === 'first_load')
    {
      $user = (new UserModel)->get_logged_user();
      if (empty($user) === TRUE)
      {
        LoginView::display();
      }
      else
      {
        $product_list = (new ProductModel)->get_all_product(10, 0);
        HomeView::display($user, $product_list);
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
