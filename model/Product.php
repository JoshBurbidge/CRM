<?php
class Product {
  public $name;
  public $price;
  
  function __construct($name, $price, $image) {
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
  }
}

function getProducts() {
  include("configuration.php");

  $conn = new mysqli($servername, $db_username, $db_password, $default_db);
  $sql = "SELECT * FROM product_info";
  $stmt = $conn->prepare($sql);
  $stmt->bind_result($id, $name, $price, $type, $quantity);
  $stmt->execute();

  $products = [];
  while ($stmt->fetch()) {
    $image = $name.".jpg";
    array_push($products, new Product($name, $price, $image));
  }
  $conn->close();

  // $products = [];
  // for ($i=0; $i < 10; $i++) { 
  //   array_push($products, new Product("Product", 9.99));
  // }
  return $products;
}