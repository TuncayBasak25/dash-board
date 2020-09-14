<?php

class SignupView
{
  public static function display()
  {
    ?>
    <div id="login_signup_container" class="d-flex flex-wrap justify-content-center align-items-center" style="height: 100vh;">
      <div class="">
        <form id="signup" onsubmit="formSubmit(this)" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" pattern=".{4,30}">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" pattern=".{10,100}">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password_repeat" placeholder="Password">
          </div>
        </form>
        <button form="signup" type="submit" class="btn btn-primary col-12">Signup</button>
        <button type="button" class="btn btn-primary col-12 mt-2" onclick="ajax(request('load_login'))">Or Login</button>
        <div id="signup_message"></div>
      </div>
    </div>
    <?php
  }
}
