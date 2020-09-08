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
