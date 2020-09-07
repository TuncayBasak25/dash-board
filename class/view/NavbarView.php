<?php

class NavbarView
{
  public static function display($output_buffering = TRUE)
  {
    if ($output_buffering === TRUE) ob_start();

    // Nav button Etc

    // User nav section

    ?>
    <section id="user_nav_section">
    <?php
      NavbarView::user_nav_section(false);
    ?>
    </section>
    <?php
    if ($output_buffering === TRUE)
    {
      $html = ob_get_contents();
      ob_clean();
      return $html;
    }
  }

  public static function user_nav_section($output_buffering = TRUE)
  {
    if ($output_buffering === TRUE) ob_start();

      if (isset($_SESSION['user_id']) === TRUE)
      {
        ?>
        <span>You are logged as <?= session_id() ?>.</span>
        <?php
        FormView::logout_form(false);
      }
      else
      {
        FormView::signup_form(false);
        FormView::login_form(false);
      }

    if ($output_buffering === TRUE)
    {
      $html = ob_get_contents();
      ob_clean();
      return $html;
    }
  }

}
