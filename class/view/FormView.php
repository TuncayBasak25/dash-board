<?php

class FormView
{
  public static function login_form()
  {
    ?>
    <form id="login_form" onsubmit="formSubmit(this)" method="post"></form>
    <input class="h-75 mr-1" form="login_form" type="text" name="user_id" placeholder="username or email">
    <input class="h-75 mr-1" form="login_form" type="password" name="password" placeholder="password">
    <input class="h-75 mr-1" form="login_form" type="submit" name="request" value="login">
    <p id="login_error" class="d-inline text-white"></p>
    <?php
  }

  public static function logout_form()
  {
    ?>
    <form id="logout_form" class="d-none" onsubmit="formSubmit(this)" method="post"></form>
    <input class="h-75" form="logout_form" type="submit" name="request" value="logout">
    <?php
  }

  public static function signup_form()
  {
    ?>
    <form id="signup_form" class="d-none" onsubmit="formSubmit(this)" method="post"></form>
    <input class="h-75 mr-1 ml-1" form="signup_form" type="submit" name="request" value="signup">
    <?php
  }

  public static function acceuil_form()
  {
    ?>
    <form id="acceuil_form" class="d-none" onsubmit="formSubmit(this)" method="post"></form>
    <input class="mr-1 ml-1" form="acceuil_form" type="submit" name="request" value="acceuil">
    <?php
  }
}
