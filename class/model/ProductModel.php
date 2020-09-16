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
      purchase_date DATETIME NOT NULL,
      warrant_limit DATETIME NOT NULL,

      manual TEXT
    )";

    $this->init_data_base();
  }

  public function fetch_column($owner, $column, $column2 = FALSE)
  {
    $extra_column = "";
    if ($column2 !== FALSE)
    {
      $extra_column = " ,$column2";
    }

    $sql = "SELECT $column $extra_column FROM $this->table WHERE owner = ?";

    $result = $this->query($sql, $owner);

    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function fetch_column_distinct($owner, $column)
  {
    $sql = "SELECT DISTINCT $column FROM $this->table WHERE owner = ?";

    $result = $this->query($sql, $owner);

    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function add_product($owner, $name, $reference, $category, $price, $purchase_type, $purchase_adress, $purchase_url, $purchase_date, $warrant_limit, $manual = '')
  {
    $sql = "INSERT INTO $this->table (owner, name, reference, category, price, purchase_type, purchase_adress, purchase_url, purchase_date, warrant_limit, manual) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $result = $this->query($sql, $owner, $name, $reference, $category, $price, $purchase_type, $purchase_adress, $purchase_url, $purchase_date, $warrant_limit, $manual);

    return $result;
  }

  public function get_all_product_of($owner, $limit, $offset, $order = FALSE, $category = FALSE, $price = FALSE, $purchase_type = FALSE, $warrant_limit = FALSE)
  {
    $order_sql = "";
    if ($order !== FALSE && $order !== 'none')
    {
      $order_sql = "ORDER BY $order";
    }

    $category_sql = "";
    if ($category !== FALSE && $category !== 'all')
    {
      $category_sql = " AND category = '$category' ";
    }

    $price_sql = "";
    if ($price !== FALSE && $price !== 'all')
    {
      $price_sql = " AND price $price ";
    }

    $purchase_type_sql = "";
    if ($purchase_type !== FALSE && $purchase_type !== 'all')
    {
      $purchase_type_sql = " AND purchase_type = '$purchase_type' ";
    }

    $warrant_limit_sql = "";
    if ($warrant_limit !== FALSE && $warrant_limit !== 'all')
    {
      $warrant_limit_sql = " AND warrant_limit $warrant_limit ";
    }

    $test_sql = $category_sql . $price_sql . $purchase_type_sql . $warrant_limit_sql;

    $sql = "SELECT * FROM $this->table WHERE owner = ? $test_sql $order_sql LIMIT ? OFFSET ?";
    $product_list = $this->query($sql, $owner, $limit, $offset)->fetch_all(MYSQLI_ASSOC);

    return $product_list;
  }

  public function count_all_product_of($owner, $category = FALSE, $price = FALSE, $purchase_type = FALSE, $warrant_limit = FALSE)
  {
    $category_sql = "";
    if ($category !== FALSE && $category !== 'all')
    {
      $category_sql = " AND category = '$category' ";
    }

    $price_sql = "";
    if ($price !== FALSE && $price !== 'all')
    {
      $price_sql = " AND price $price ";
    }

    $purchase_type_sql = "";
    if ($purchase_type !== FALSE && $purchase_type !== 'all')
    {
      $purchase_type_sql = " AND purchase_type = '$purchase_type' ";
    }

    $warrant_limit_sql = "";
    if ($warrant_limit !== FALSE && $warrant_limit !== 'all')
    {
      $warrant_limit_sql = " AND warrant_limit $warrant_limit ";
    }

    $test_sql = $category_sql . $price_sql . $purchase_type_sql . $warrant_limit_sql;

    $sql = "SELECT COUNT(*) FROM $this->table WHERE owner = ? $test_sql";
    $product_count = $this->query($sql, $owner)->fetch_assoc()['COUNT(*)'];

    return $product_count;
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

  public function reset()
  {
    $this->resetTable();
  }
}
