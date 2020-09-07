<?php

class RequestController
{
  public static function execute($request, $inputs = false)
  {
    if ($request === 'first_load') {
      $response = HomePageView::display();
    }
    else if ($request === 'login') {
      $response = SessionController::login($inputs);
    }
    else if ($request === 'logout') {
      $response = SessionController::logout();
    }
    else if (substr($request, 0, 14) === "product_detail")
    {
      $ref = substr($request, 16);
      ob_start();
      MainView::detail();
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
