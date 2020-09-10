<?php

class MenuView
{
  public static function accueil()
  {
    ?>
    <button onClick="ajax(request('test'))" type="button" class="btn btn-success"></button>
    <?php
  }
}
