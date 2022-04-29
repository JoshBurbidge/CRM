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
  // $stmt->bind_result($id, $name, $price, $type, $quantity);
  $stmt->execute();
  $results = $stmt->get_result();

  $products = [];
  // while ($stmt->fetch()) {
  foreach ($results as $row) {
    $name = $row["product_name"];
    $id = $row["product_id"];

    $price = $row["product_cost"];
    $code = $row["product_model"];
    $group = $row["product_group"];
    $image = "placeholder.jpg";
    array_push($products, new Product($name, $price, $code, $image, $group, $id));
  }
    
  
  $conn->close();

  // $products = [];
  // for ($i=0; $i < 10; $i++) { 
  //   array_push($products, new Product("Product", 9.99));
  // }
  return $products;
}

function getProducts($list) {
  include("configuration.php");

  $conn = new mysqli($servername, $db_username, $db_password, $default_db);
  $products = [];
  


  foreach ($list as $item) {
    $sql = "SELECT * FROM product where product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $item);
    $stmt->execute();
    $results = $stmt->get_result();

    foreach ($results as $row) {
      $name = $row["product_name"];
      $id = $row["product_id"];
  
      $price = substr($row["product_cost"], 1);
      $code = $row["product_model"];
      $group = $row["product_group"];
      $image = "placeholder.jpg";
      array_push($products, new Product($name, $price, $code, $image, $group, $id));
    }
  }
    
  $conn->close();
  return $products;
}