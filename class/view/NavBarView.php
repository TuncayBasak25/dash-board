<?php

class NavBarView{

  public static function connected(){
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <a style="cursor:pointer" class="navbar-brand" onclick="ajax(request('accueil'))" >ACS SHOP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <?= FormView::logout_form() ?>
          </li>
        </ul>
      </div>
    </nav>
    <?php
  }
  public static function disconnected(){
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <a style="cursor:pointer" class="navbar-brand" onclick="ajax(request('accueil'))" >ACS SHOP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item mx-lg-2">
            <button class="btn btn-outline-light my-2 my-sm-0" onclick="ajax(request('signup_page'))">S'enregistrer</button>
          </li>
          <li class="nav-item">
            <?= FormView::login_form() ?>
          </li>
        </ul>
      </div>
    </nav>
    <?php
  }
}
