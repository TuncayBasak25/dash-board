<?php

class ProductModel extends DataBaseModel
{

  public function __construct()
  {
    $this->table = "product";
    $this->table_columns = "(
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

      owner TEXT NOT NULL,

      name TEXT NOT NULL,
      reference TEXT NOT NULL,
      category TEXT NOT NULL,
      price INT NOT NULL,

      purchase_type ENUM('web', 'physic'),
      purchase_adress TEXT,
      purchase_url TEXT,
      purchase_date DATE NOT NULL,
      warrant_limit DATE NOT NULL,

      manual TEXT
    )";

    $this->init_data_base();
  }

  public function add_product($owner, $name, $reference, $category, $price, $purchase_type, $purchase_adress, $purchase_url, $purchase_date, $warrant_limit, $manual = '')
  {
    $sql = "INSERT INTO $this->table (owner, name, reference, category, price, purchase_type, purchase_adress, purchase_url, purchase_date, warrant_limit, manual) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $result = $this->query($sql, $owner, $name, $reference, $category, $price, $purchase_type, $purchase_adress, $purchase_url, $purchase_date, $warrant_limit, $manual);

    return $result;
  }

  public function get_all_product_of($owner, $limit, $offset)
  {
    $sql = "SELECT * FROM $this->table WHERE owner = ? LIMIT ? OFFSET ?";
    $product_list = $this->query($sql, $owner, $limit, $offset)->fetch_all(MYSQLI_ASSOC);

    $sql = "SELECT COUNT(*) FROM $this->table WHERE owner = ?";
    $product_count = $this->query($sql, $owner)->fetch_assoc()['COUNT(*)']
  }

  public function get_product_by($column_name, $column_value)
  {
    $sql = "SELECT * FROM $this->table WHERE $column_name = ?";

    $result = $this->query($sql, $column_value);

    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function recherche($key_word, $limit, $offset)
  {
    $key_word = "%$key_word%";
    $sql = "SELECT * FROM $this->table WHERE name LIKE ? LIMIT ? OFFSET ?";
    $result['product_list'] = $this->query($sql, $key_word, $limit, $offset)->fetch_all(MYSQLI_ASSOC);

    $sql = "SELECT COUNT(*) FROM $this->table WHERE name LIKE ?";
    $result['total_product'] = $this->query($sql, $key_word)->fetch_assoc()['COUNT(*)'];

    return $result;
  }

  public function delete_product_by($column_name, $column_value)
  {
    $sql = "DELETE FROM $this->table WHERE $column_name = ?";

    $result = $this->query($sql, $column_value);

    return $result;
  }
}
