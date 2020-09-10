<?php

class HomePageView
{
  public static function display($product_list)
  {
    ?>
      <section id="navbar_section" class="">
        <?php
        if (isset($_SESSION['username']) === TRUE && empty($_SESSION['username']) === FALSE)
        {
          NavBarView::connected();
        }
        else
        {
          NavBarView::disconnected();
        }
        ?>
      </section>
      <div id="main_container" class="d-flex">
        <section id="menu_section" class="col-2">
          <?= MenuView::accueil(); ?>
        </section>
        <section id="main_section" class="col-10">
          <?= MainView::accueil($product_list); ?>
        </section>
      </div>
    <?php
  }
}
?>
