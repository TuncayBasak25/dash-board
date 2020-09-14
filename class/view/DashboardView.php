 <?php

 class DashboardView{
   public static function purchase($product_list){
     foreach ($product_list as $product) {
     ?>
    <tbody>
      <tr>
        <th scope="row"><?= $product['product_name'] ?></th>
        <td><?= $product['ref'] ?></td>
        <td><?= $product['id'] ?></td>
        <td><?= $product['price'] ?></td>
      </tr>
    <?php
    $data[] = $product['price'];
    }
    ?>
    </tbody>
  </table>
  <canvas id="myChart" width="400px" height="400px"></canvas>
     <?php
   }
 }
