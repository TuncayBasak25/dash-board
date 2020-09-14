<?php

include "include/header.php";


function RandomString($length)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $strlen = strlen($characters);
  $randstring = '';
  for ($i = 0; $i < $length; $i++)
  {
    $index = rand(0, $strlen-1);
    $randstring .= $characters[$index];
  }
  return $randstring;
}

$user = (new UserModel)->get_logged_user();

$productModel = new ProductModel();
for($i=0; $i<50; $i++)
{
  $owner = $user['username'];

  $name = RandomString(10);
  $reference = RandomString(10);
  $category = RandomString(10);
  $price = rand(10, 1500);

  if (rand(0, 1) === 0)
  {
    $purchase_type = "web";
    $purchase_adress = "";
    $purchase_url = "www." . RandomString(15) . ".com";
  }
  else
  {
    $purchase_type = "physic";
    $purchase_adress = rand(1, 40) . " rue de " . RandomString(12) . " " . rand(20000, 25000) . " " . RandomString(15);
    $purchase_url = "";
  }

  $purchase_date = date('d.m.y');
  $warrant_limit = date('d.m.y', time() + rand(50000, 500000));

  if (rand(0, 1) === 0)
  {
    $manual = "Bla Bla";
  }
  else
  {
    $manual = "";
  }

  $productModel->add_product($owner, $name, $reference, $category, $price, $purchase_type, $purchase_adress, $purchase_url, $purchase_date, $warrant_limit, $manual);
}

RequestController::execute('first_load');







include "include/footer.php";
