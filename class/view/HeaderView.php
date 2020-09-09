<?php

class HeaderView
{
  public static function connected()
  {
    ?>
    <div id="user_menu" class="">
      <?= NavBarView::connected() ?>
    </div>

    <?php
  }

  public static function disconnected()
  {
    ?>
    <div id="session_div" class="d-flex align-items-center">
      <?= NavBarView::disconnected() ?>
    </div>

    <?php
  }

}
