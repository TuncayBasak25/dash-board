<?php

class ProductController
{
  public static function recherche($key_word, $page)
  {
    $productModel = new ProductModel();

    $recherche_result = $productModel->recherche($key_word, 5, ($page - 1) * 5);

    $maxPage = ceil(intval($recherche_result['total_product']) / 5);


    ob_start();
    MainView::recherche($recherche_result['product_list']);
    PaginationView::recherche_pagination($page, $maxPage, $key_word);
    $response['main_section'] = ob_get_contents();
    ob_clean();

    return $response;
  }
}
