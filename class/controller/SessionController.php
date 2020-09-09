<?php

  class SessionController {

    public static function login($user_id, $password, $email)
    {
      $userModel = new UserModel();

      $userData = $userModel->get_user($user_id);
      if (empty($userData) === TRUE) {
        echo "!User id is wrong.";
        return FALSE;
      }

      if (password_verify($password, $userData['password']) === FALSE) {
      echo "!Wrong Password.";
      return FALSE;
    }

    public static function UserRegister($username, $email, $password){

    


  }

 ?>
