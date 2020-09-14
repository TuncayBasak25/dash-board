<?php

class LoginView
{
  public static function display()
  {
    ?>
    <div id="login_signup_container" class="d-flex flex-wrap justify-content-center align-items-center" style="height: 100vh;">
      <div class="">
        <form id="login" onsubmit="formSubmit(this)" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="login_id" placeholder="Username or email" pattern=".{4,30}">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" pattern=".{4,30}">
          </div>
        </form>
        <button form="login" type="submit" class="btn btn-primary col-12">Login</button>
        <button type="button" class="btn btn-primary col-12 mt-2" onclick="ajax(request('load_signup'))">Or Signup</button>
        <div id="login_message"></div>
      </div>
    </div>
    <?php
  }
}
