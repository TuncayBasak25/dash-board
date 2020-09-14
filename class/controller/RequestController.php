<?php

class RequestController
{
  public static function execute($request, $input_list = null)
  {
    if ($request === 'first_load')
    {
      LoginView::display();
    }
    else if ($request === 'load_signup')
    {
      ob_start();
      SignupView::display();
      $response['body'] = ob_get_contents();
      ob_clean();
    }

    if (isset($response) === TRUE)
    {
      echo json_encode($response);
    }
  }
}
