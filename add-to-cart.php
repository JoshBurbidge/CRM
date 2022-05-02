<?php 
// echo "a";
// if (isset($_COOKIE["userId"])) {
//   echo "true";
// } else {
//   echo "false";
// }
if (!isset($_COOKIE["userId"])) {
  session_start();
  $_SESSION['account'] = "You must create an account before adding a product to the cart";
  header("location: register.php");
  
} else {
// echo $_GET["id"];
  $id = $_GET["id"];
  $current = "";
  if (isset($_COOKIE["cart"])) {
    $current = $_COOKIE["cart"];
    setcookie("cart", $current."_".$id);
  } else {
    setcookie("cart", $id);
  }
  header("location: .");
}