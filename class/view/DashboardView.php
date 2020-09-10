 <?php

 class DashboardView{
   public static function purchase($product){
     ?>
    <tbody>
      <tr>
        <th scope="row"><?= $product['product_name'] ?></th>
        <td><?= $product['ref'] ?></td>
        <td><?= $product['id'] ?></td>
        <td><?= $product['price'] ?></td>
      </tr>
    </tbody>
  </table>




     <?php
   }
 }
