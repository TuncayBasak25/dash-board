<?php

class RequestController
{
  public static function execute($request, $input_list = false)
  {
    if ($request === 'first_load') {
      $response = HomePageView::display();
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

      ob_start();
      MainView::detail($reference);
      $response['main_section'] = ob_get_contents();
      ob_clean();
    }
    else if ($request === 'acceuil')
    {
      ob_start();
      MainView::acceuil();
      $response['main_section'] = ob_get_contents();
      ob_clean();
    }
    else if ($request === 'recherche')
    {
      if (isset($input_list['key_word']) === TRUE)
      {
        $page = 1;
        if (isset($input_list['page']) === TRUE)
        {
          $page = intval($input_list['page']);
        }
        $response = ProductController::recherche($input_list['key_word'], $page);
      }
    }
    else
    {
      $response = "This is an unkown request.";
    }


    // Une fois la requete executé
    if ($request !== 'first_load') {
      RequestController::responds($response);
    }
    else if (isset($response) === TRUE)
    {
      echo $response;
    }
  }

  public static function responds($response)
  {
    echo json_encode($response);
  }
}
