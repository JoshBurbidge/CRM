<?php
class Product {
  public $name;
  public $price;
  
  function __construct($name, $price, $code, $image, $group, $id) {
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
    $this->code = $code;
    $this->group = $group;
    $this->id = $id;
  }
}

function getAllProducts() {
  include("configuration.php");

  $conn = new mysqli($servername, $db_username, $db_password, $default_db);
  $sql = "SELECT * FROM product";
  $stmt = $conn->prepare($sql);
  $stmt->bind_result($id, $cat, $subcat, $group, $vendor, $name, $model, $cost, $price, $weight);
  $stmt->execute();
  // $results = $stmt->get_result(); // need to do fetch instead

  $products = [];
  while ($stmt->fetch()) {
  // foreach ($results as $row) {
    // $name = $row["product_name"];
    // $id = $row["product_id"];

    // $price = $row["product_cost"];
    // $code = $row["product_model"];
    // $group = $row["product_group"];
    $image = str_replace(" ", "-", $name).".jpg";
    if (!file_exists("images/".$image)){
      $image = "placeholder.jpg";
    }
    array_push($products, new Product($name, $price, $model, $image, $group, $id));
  }
    
  
  $conn->close();
  return $products;
}

function getProducts($list) {
  include("configuration.php");

  $conn = new mysqli($servername, $db_username, $db_password, $default_db);
  $products = [];

  if (!empty($list)) {
    foreach ($list as $item) {
      $sql = "SELECT * FROM product where product_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('s', $item);
      // use price
      $stmt->bind_result($id, $cat, $subcat, $group, $vendor, $name, $model, $cost, $price, $weight);
      $stmt->execute();
      // $results = $stmt->get_result();

      // foreach ($results as $row) {
      while($stmt->fetch()) {
        // $name = $row["product_name"];
        // $id = $row["product_id"];
    
        $price = substr($price, 1);
        // $code = $row["product_model"];
        // $group = $row["product_group"];
        $image = str_replace(" ", "-", $name).".jpg";
        if (!file_exists("images/".$image)){
          $image = "placeholder.jpg";
        }
        array_push($products, new Product($name, $price, $model, $image, $group, $id));
      }
    }
  }
    
  $conn->close();
  return $products;
}