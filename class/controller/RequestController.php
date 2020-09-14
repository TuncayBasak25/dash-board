<?php

class RequestController
{
  public static function execute($request, $input_list = null)
  {
    if ($request === 'first_load')
    {
      LoginView::display();
    }
  }
}
