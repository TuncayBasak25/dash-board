<?php

class ProductModel extends DataBaseModel
{

  public function __construct()
  {
    $this->table = "product";
    $this->table_columns = "(
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
      product_name VARCHAR(30) NOT NULL,
      ref VARCHAR(60) NOT NULL,
      category VARCHAR(60) NOT NULL,
      owner_manual TEXT,
      purchase_date INT NOT NULL,
      price INT NOT NULL,
      warranty INT,
      receipt TEXT,
      product_image MEDIUMBLOB
    )";


    $this->init_data_base();
  }

  public function add_product($name, $ref, $category, $owner, $purchase_date, $price, $warrenty, $receipt , $image)
  {
    $sql = "INSERT INTO $this->table (name, ref, category, owner, purchase_date, price, warrenty, receipt , image) VALUES (?,?,?,?,?,?,?,?,?)";

    $result = $this->query($sql, $name, $ref, $category, $owner, $purchase_date, $price, $warrenty, $receipt , $image);

    return $result;
  }

  public function get_product($name) //Renvoie un tableau associatif de tous les produit possedé par un utilisateur
  {
    $sql = "SELECT * FROM $this->table WHERE product_name = ?";

    $result = $this->query($sql, $name);

    return $result->fetch_assoc();
  }

  public function get_product_category() //Renvoie un tableau associatif de tous les produit possedé par un utilisateur
  {
    $sql = "SELECT DISTINCT category FROM $this->table";

    $result = $this->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function get_all_product()
  {
      $sql = "SELECT * FROM $this->table";

      $result = $this->query($sql);


    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function get_product_photo($name)
  {
    $sql = "SELECT photo FROM $this->table WHERE name = ?";

    $result = $this->query($sql, $name);

    return $result->fetch_assoc();
  }

  public function set_product_photo($name, $photo)
  {
    $sql = "UPDATE $this->table SET photo = ? WHERE name = ?";

    $result = $this->queryBlob($sql, $photo, $name);

    if ($result !== FALSE) {
      $sql = "UPDATE $this->table SET is_default_photo = ? WHERE name = ?";

      $result = $this->query($sql, 'false', $name);
    }
    return $result;
  }

  public function delete_product($name)
  {
    $sql = "DELETE FROM $this->table WHERE name = ?";

    $result = $this->query($sql, $name);

    return $result;
  }
}
