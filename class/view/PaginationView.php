<?php

class PaginationView
{
  public static function recherche_pagination($actualPage, $maxPage, $key_word)
  {
    for ($page=1; $page <= $maxPage; $page++) {
      if ($page !== $actualPage)
      {
        ?>
        <button onclick="ajax(request('recherche', ['page=<?= $page ?>', 'key_word=<?= $key_word ?>']))" style="width: 20px; height: 20px" type="button" name="button"><?= $page ?></button>
        <?php
      }
      else
      {
        ?>
        <button disabled style="width: 20px; height: 20px" type="button" name="button"><?= $page ?></button>
        <?php
      }
    }
  }
}
