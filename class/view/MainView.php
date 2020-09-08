<?php

class MainView
{
  public static function acceuil()
  {
    ?>
    <div class="d-flex flex-wrap">
    <?php
    for ($i=0; $i < 9; $i++) {
      ?>
      <div id="product- <?= $i ?>" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
        <?= ProductView::card() ?>
      </div>
      <?php
    }
    ?>
    </div>
    <?php
  }

  public static function recherche()
  {

  }

  public static function detail($reference)
  {
    ?>
    <div id="detail_view" class="w-100">
      <?php
      ProductView::detail($reference);
       ?>
    </div>
    <?php
  }
}
