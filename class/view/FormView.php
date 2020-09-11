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
    <input class="btn btn-outline-light my-2 my-sm-0" form="logout_form" type="submit" name="request" value="logout">
    <?php
  }

  public static function signup_form()
  {
    ?>
    <form id="signup_form" class=" my-2 my-lg-0" onsubmit="formSubmit(this)" method="post">
      <p>Nom d'utilisateur :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="username" placeholder="Nom d'utilisateur">
      <p>Adresse email :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="email" placeholder="Email">
      <p>Mot de passe :</p>
      <input class="mr-sm-2" form="signup_form" type="password" name="password" placeholder="Mot de passe">
      <p>Confirmer mot de passe :</p>
      <input class="mr-sm-2" form="signup_form" type="password" name="password_repeat" placeholder="Confirmation mot de passe">
      <p>Prénom :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="firstname" placeholder="Prénom">
      <p>Nom :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="lastname" placeholder="Nom">
      <p>Adresse :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="adress" placeholder="n° et adresse">
      <p>Ville :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="city" placeholder="Ville">
      <p>Code postal :</p>
      <input class="mr-sm-2" form="signup_form" type="text" name="postalcode" placeholder="Code Postal">
      <br>
      <br>
      <button class="btn btn-outline-success my-2 my-sm-0" form="signup_form" name="request" value="signup" type="submit"onclick="ajax(request('signup'))">S'enregistrer</button>
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
