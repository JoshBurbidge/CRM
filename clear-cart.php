<?php

if (isset($_COOKIE['cart'])) {
  unset($_COOKIE['cart']);
  setcookie('cart', null, -1); // empty value and old timestamp
}
header("location: .");