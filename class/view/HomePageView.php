<?php

class HomePageView
{
  public static function display()
  {
    ?>
      <section id="header_section" class="d-flex justify-content-between">
        <?php
        if (isset($_SESSION['username']) === TRUE && empty($_SESSION['username']) === FALSE)
        {
          HeaderView::connected();
        }
        else
        {
          HeaderView::disconnected();
        }
        ?>
      </section>

      <section style="height: 50px;"></section>

      <div id="main_container" class="d-flex">
        <section id="menu_section" class="col-2">
          <?php MenuView::acceuil(); ?>
        </section>
        <section id="main_section" class="col-10">
          <?php MainView::acceuil(); ?>
        </section>
      </div>
    <?php
  }
}
