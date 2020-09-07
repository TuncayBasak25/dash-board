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
