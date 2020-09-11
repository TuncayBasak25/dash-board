<?php

class RequestController
{
  public static function execute($request, $input_list = false)
  {
    if ($request === 'first_load') {
      $product_list = (new ProductModel)->get_all_product();
      $response = HomePageView::display($product_list);
    }
    else if ($request === 'login') {
      $response = SessionController::login($input_list);
    }
    else if ($request === 'logout') {
      $response = SessionController::logout();
    }
    else if ($request === "product_detail")
    {
      $reference = $input_list['reference'];
      $product = (new ProductModel)->get_product($reference);
      ob_start();
      MainView::detail($product);
      $response['main_section'] = ob_get_contents();
      ob_clean();
    }
    else if ($request === 'accueil')
    {
      $product_list = (new ProductModel)->get_all_product();
      ob_start();
      MainView::accueil($product_list);
      $response['main_section'] = ob_get_contents();
      ob_clean();
    }
    else if ($request === 'signup_page')
    {
      ob_start();
      MainView::signup();
      $response['main_section'] = ob_get_contents();
      ob_clean();
    }
<<<<<<< HEAD
    else if ($request === 'dashboard')
    {
      $reference = $input_list['reference'];
      $product = (new ProductModel)->get_product($reference);
      ob_start();
      MainView::purchase_list($product);
      $response['main_section'] = ob_get_contents();
      ob_clean();
    }
=======
    else if ($request === 'test')
    {
      $product_list = (new ProductModel)->get_all_product();
      ob_start();
      ShoppingCartView::display_basket($product_list);
      $response['main_section'] = ob_get_contents();
      ob_clean();
    }

    else if ($request === 'supprimer_article') {
      $reference = $input_list['reference'];
      ob_start();
      (new ProductModel)->delete_product($reference);
      $product_list = (new ProductModel)->get_all_product();
      ShoppingCartView::display_basket($product_list);
      $response['main_section'] = ob_get_contents();
      ob_clean();

    }

>>>>>>> 70aca691ccacf0222f82324c236c9fa8f3eaa9da
    else {
      $response = 'there is no request.';
    }

    // Une fois la requete executé
    if ($request !== 'first_load') {
      RequestController::responds($response);
    }
    else
    {
      echo $response;
    }
  }

  public static function responds($response)
  {
    echo json_encode($response);
  }
}
