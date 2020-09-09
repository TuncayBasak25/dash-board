<?php

class FormView
{
  public static function login_form()
  {
    ?>
    <form id="login_form" class="form-inline my-2 my-lg-0" onsubmit="formSubmit(this)" method="post">
    <input class="form-control mr-sm-2" form="login_form" type="text" name="user_id" placeholder="username or email">
    <input class="form-control mr-sm-2" form="login_form" type="password" name="password" placeholder="password">
    <button class="btn btn-outline-light my-2 my-sm-0" form="login_form" name="request" value="login" type="submit">Connexion</button>
    <p id="login_error" class="d-inline text-white"></p>
    </form>
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
    <form id="signup_form" class=" my-2 my-lg-0" onsubmit="formSubmit(this)" method="post">
      <p>Nom d'utilisateur :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="username" placeholder="username">
      <p>Adresse email :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="email" placeholder="email">
      <p>Prénom :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="firstname" placeholder="firstname">
      <p>Mot de passe :</p>
      <input class="mr-sm-2" form="signup_form" type="password" name="password" placeholder="password">
      <p>Confirmer mod de passe :</p>
      <input class="mr-sm-2" form="signup_form" type="password" name="password_repeat" placeholder="password repeat">
      <button class="btn btn-outline-light my-2 my-sm-0" form="signup_form" name="request" value="signup" type="submit">S'enregistrer</button>
      <p id="signup_error" class="d-inline text-white"></p>
    </form>
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
