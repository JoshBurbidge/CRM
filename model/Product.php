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
  $products = [];
  for ($i=0; $i < 10; $i++) { 
    array_push($products, new Product("Product", 9.99));
  }
  return $products;
}