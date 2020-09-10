<?php

class ProductModel extends DataBaseModel
{

  public function __construct()
  {
    $this->table = "product";
    $this->table_columns = "(
      id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,

      name VARCHAR(30) NOT NULL,

      price INT,

      description TEXT,

      warrent_time INT,

      photo MEDIUMBLOB,
      is_default_photo CHAR(5) DEFAULT 'true'
    )";

    $this->init_data_base();
  }

  public function add_product($name, $price, $description, $warrent_time = 1000)
  {
    $sql = "INSERT INTO $this->table (name, price, description, warrent_time) VALUES (?,?,?,?)";

    $result = $this->query($sql, $name, $price, $description, $warrent_time);

    return $result;
  }

  public function get_product($name)
  {
    $sql = "SELECT (id, name, price, description, warrent_time, is_default_photo) FROM $this->table WHERE name = ?";

    $result = $this->query($sql, $name);

    return $result->fetch_assoc();
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
