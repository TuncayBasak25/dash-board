<?php

class UserController
{
  public static function signup($input_list)
  {
    $username;
    $email;
    $password;
    $password_repeat;

    if (isset($input_list['username']) === FALSE || empty($input_list['username']) === TRUE)
    {
      $response['signup_message'] = 'Username is missing or empty';
      return $response;
    }
    $username = $input_list['username'];

    if (isset($input_list['email']) === FALSE || empty($input_list['email']) === TRUE)
    {
      $response['signup_message'] = 'Username is missing or empty';
      return $response;
    }
    $email = $input_list['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
    {
      $response['signup_message'] = "This is an unvalid email.";
      return $response;
    }

    if (isset($input_list['password']) === FALSE || empty($input_list['password']) === TRUE)
    {
      $response['signup_message'] = 'Username is missing or empty';
      return $response;
    }
    $password = $input_list['password'];

    if (isset($input_list['password_repeat']) === FALSE || empty($input_list['password_repeat']) === TRUE)
    {
      $response['signup_message'] = 'Username is missing or empty';
      return $response;
    }
    $password_repeat = $input_list['password_repeat'];

    $userModel = new UserModel();

    if (empty($userModel->get_user_by('username', $username)) === FALSE)
    {
      $response['signup_message'] = "This username is already taken.";
      return $response;
    }

    if (empty($userModel->get_user_by('email', $email)) === FALSE)
    {
      $response['signup_message'] = "This email is already taken.";
      return $response;
    }

    if ($password !== $password_repeat)
    {
      $response['signup_message'] = "Please enter the same password";
      return $response;
    }

    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    $userModel->add_user($username, $email, $hashed_pass);

    $response['signup_message'] = "Your signup is successfull, you can now login.";

    return $response;
  }
}
