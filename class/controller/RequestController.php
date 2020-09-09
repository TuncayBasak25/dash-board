<?php

class RequestController{

    public static function execute($request, $inputs = FALSE){
      if ($request === "first_load") {
        LoginPageView::display();
    }
   }
  }

 ?>
