<?php

class SessionController
{
  public static function login($input_list)
  {
    $login_id;
    $password;

    if (isset($input_list['login_id']) === FALSE || empty($input_list['login_id']) === TRUE)
    {
      $response['login_message'] = "The username or email is missing or empty";
      return $response;
    }
    $login_id = $input_list['login_id'];

    if (isset($input_list['password']) === FALSE || empty($input_list['password']) === TRUE)
    {
      $response['login_message'] = "The password is missing or empty";
      return $response;
    }
    $password = $input_list['password'];

    $userModel = new UserModel();

    $user = $userModel->get_user($login_id);

    if (empty($user) === TRUE)
    {
      $response['login_message'] = "This user doesn't exist.";
      return $response;
    }

    if (password_verify($password, $user['password']) === FALSE)
    {
      $response['login_message'] = "The password is wrong.";
      return $response;
    }

    $userModel->log_user($user['username']);

    $product_list = (new ProductModel)->get_all_product(10, 0);

    ob_start();
    HomeView::display($user, $product_list);
    $response['body'] = ob_get_contents();
    ob_clean();

    return $response;
  }

  public static function logout()
  {
    (new UserModel)->logout_user();

    ob_start();
    LoginView::display();
    $response['body'] = ob_get_contents();
    ob_clean();

    return $response;
  }
}
