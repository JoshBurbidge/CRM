<?php
class Product {
  public $name;
  public $price;
  
  function __construct($name, $price) {
    $this->name = $name;
    $this->price = $price;
  }
}

function getProducts() {
  include_once("../configuration.php");

  // $conn = new mysqli($servername, $db_username, $db_password, $default_db);
  // $sql = "SELECT * FROM product_info";
  // $stmt = $conn->prepare($sql);
  // echo $stmt;
  // $stmt->bind_result($id, $name, $price, $type, $quantity);
  // $stmt->execute();

  // while ($stmt->fetch()) {
  //   array_push($products, new Product($name, $price));
  // }

  $products = [];
  for ($i=0; $i < 10; $i++) { 
    array_push($products, new Product("Product", 9.99));
  }
  return $products;
}