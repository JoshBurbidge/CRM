<?php 
// echo $_GET["id"];
$id = $_GET["id"];
$current = "";
if (isset($_COOKIE["cart"])) {
  $current = $_COOKIE["cart"];
  setcookie("cart", $current."_".$id);
} else {
  setcookie("cart", $id);
}
header("location: shop.php");