 <?php

 class DashboardView{
   public static function purchase($product_list){
     foreach ($product_list as $product) {
     ?>
    <tbody>
      <tr>
        <th scope="row"><?= $product['product_name'] ?></th>
        <td><?= $product['ref'] ?></td>
        <td><?= $product['warranty'] ?></td>
        <td><?= $product['price'] ?>€</td>
      </tr>
    <?php
    }
    ?>
    </tbody>
  </table>
  <div class="col">
    <h3>Graphique comparatif des prix:</h3>
    <canvas id="myChart"></canvas>
  </div>
     <?php
   }
 }
