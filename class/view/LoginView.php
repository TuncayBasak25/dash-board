<?php

class LoginView
{
  public static function display()
  {
    ?>
    <div id="login_signup_container" class="d-flex flex-wrap justify-content-center align-items-center" style="height: 100vh;">
      <div class="">
        <form id="login_form">
          <div class="form-group">
            <input type="text" class="form-control" id="login_id" aria-describedby="emailHelp" placeholder="Username or email" pattern="{4,30}">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
        </form>
        <button form="login_form" type="submit" class="btn btn-primary col-12">Login</button>
        <button type="submit" class="btn btn-primary col-12 mt-2" onclick="ajax(request('load_signup'))">Or Signup</button>
      </div>
    </div>
    <?php
  }
}
