<?php

class FormView
{
  public static function login_form()
  {
    ?>
    <form id="login_form" onsubmit="formSubmit(this, loginResponse)" method="post"></form>
    <input class="h-75 mr-1" form="login_form" type="text" name="user_id" placeholder="username or email">
    <input class="h-75 mr-1" form="login_form" type="password" name="password" placeholder="password">
    <input class="h-75 mr-1" form="login_form" type="submit" name="request" value="login">
    <p id="login_error" class="d-inline text-white"></p>
    <?php
  }

  public static function logout_form()
  {
    ?>
    <form id="logout_form" class="d-none" onsubmit="formSubmit(this, logoutResponse)" method="post"></form>
    <input class="h-75" form="logout_form" type="submit" name="request" value="logout">
    <?php
  }

  public static function signup_form()
  {
    ?>
    <form id="signup_form" class="d-none" onsubmit="formSubmit(this, signupResponse)" method="post"></form>
    <input class="h-75 mr-1 ml-1" form="signup_form" type="submit" name="request" value="signup">
    <?php
  }
}
