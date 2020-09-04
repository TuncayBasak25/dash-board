<?php

class FormView
{
  public static function login_form($output_buffering = TRUE)
  {
    if ($output_buffering === TRUE) ob_start();

    ?>
    <form id="login_form" onsubmit="formSubmit(this, loginResponse)" method="post"></form>
    <input form="login_form" type="text" name="user_id" placeholder="username or email">
    <input form="login_form" type="password" name="password" placeholder="password">
    <input form="login_form" type="submit" name="request" value="login">
    <p id="login_error" class="d-inline text-white"></p>
    <?php

    if ($output_buffering === TRUE)
    {
      $html = ob_get_contents();
      ob_clean();
      return $html;
    }
  }

  public static function logout_form($output_buffering = TRUE)
  {
    if ($output_buffering === TRUE) ob_start();

    ?>
    <form id="logout_form" class="d-none" onsubmit="formSubmit(this, logoutResponse)" method="post"></form>
    <input form="logout_form" type="submit" name="request" value="logout">
    <?php

    if ($output_buffering === TRUE)
    {
      $html = ob_get_contents();
      ob_clean();
      return $html;
    }
  }

  public static function signup_form($output_buffering = TRUE)
  {
    if ($output_buffering === TRUE) ob_start();

    ?>
    <form id="signup_form" class="d-none" onsubmit="formSubmit(this, signupResponse)" method="post"></form>
    <input form="signup_form" type="submit" name="request" value="signup">
    <?php

    if ($output_buffering === TRUE)
    {
      $html = ob_get_contents();
      ob_clean();
      return $html;
    }
  }
}
