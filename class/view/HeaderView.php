<?php

class HeaderView
{
  public static function connected()
  {
    ?>
    <div id="user_menu" class="">
      <?= FormView::logout_form() ?>
    </div>

    <div id="user_message" class="">
      Welcome <?= $_SESSION['user_id'] ?>
    </div>

    <div id="user_panier" class="">
      Panier
    </div>
    <?php
  }

  public static function disconnected()
  {
    ?>
    <div id="session_div" class="d-flex align-items-center">
      <?= FormView::signup_form() ?>
      <?= FormView::login_form() ?>
    </div>

    <div id="message_div" class="d-flex align-items-center">
      <span>Welcome to dash board</span>
    </div>

    <div id="panier_div" class="d-flex align-items-center text-center">
      <span class="mr-1">Panier anonyme</span>
    </div>
    <?php
  }

}
