<?php

  class ShoppingCartView {

      public static $Huawei  = "p30";
      public static $Iphone  = "11";
      public static $Samsung = "s20";
      public static $Nokia   = "3310";


      public static function display_basket($contenu){
        echo   '<table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Product\'s name </th>
                    <th scope="col">Ref</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>';
        foreach ($contenu as $product) {
      ?>

<tr>
  <th scope="row"></th>
  <td><?= htmlentities($product['product_name']) ?></td>
  <td><?= htmlentities($product['ref']) ?></td>
  <td><?= htmlentities($product['category']) ?></td>
  <td><?= htmlentities($product['price']) ?> Euros</td>


  <td><a href="#"><button class="btn btn-danger" onClick="deleteAriticle('<?= $product['product_name'] ?>')"><span class="glyphicon glyphicon-trash"></span></button></a></td>

</tr>

<?php
        }

        echo   '</tbody>
            </table>';


        }
    }
?>
