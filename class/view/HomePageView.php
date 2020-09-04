<?php

class HomePageView
{
  public static function display($output_buffering = TRUE)
  {
    if ($output_buffering === TRUE) ob_start();

    ?>
      <section id="head_bar">
        <?php
        NavbarView::display(false);
        ?>
      </section>
      <section id="main_section" class="d-flex">
        <section id="side_bar" class="col-2">
          <?php SideBarView::display(); ?>
        </section>
        <section id="main_board" class="col-10">
          <?php MainBoardView::display(); ?>
        </section>
      </section>
    <?php

    if ($output_buffering === TRUE)
    {
      $html = ob_get_contents();
      ob_clean();
      return $html;
    }
  }
}
