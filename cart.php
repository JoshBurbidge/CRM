<?php
include("model/Product.php");
$cookies = "";
if (isset($_COOKIE["cart"]))
  $cookies = explode("_", $_COOKIE["cart"]);
$products = getProducts($cookies);
// print_r($products);
$total = 0.0;
?>

<head>
  <link rel="stylesheet" href="css/cart.css">
</head>

<body>


  <div class="card">
    <div class="row">
      <div class="col-md-8 cart">
        <div class="title">
          <div class="row">
            <div class="col">
              <h4><b>Shopping Cart</b></h4>
            </div>
            <div class="col align-self-center text-right text-muted"></div>
          </div>
        </div>
        <?php foreach ($products as $product) { 
          $total = $total + $product->price;
          ?>

        <div class="row border-top border-bottom">
          <div class="row main align-items-center">
            <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
            <div class="col">
              <h2 class="row"><?php echo $product->name ?></h2>
              <div class="row"><?php echo $product->group ?></div>
            </div>
            <div class="col">1</div>
            <div class="col">&dollar; <?php echo $product->price ?> </div>
          </div>
        </div>

        <?php } ?>

        <div class="back-to-shop"><a href="shop.php">&leftarrow;<span class="text-muted">Back to
              shop</span></a></div>
      </div>
      <div class="col-md-4 summary">
        <div>
          <h5><b>Summary</b></h5>
        </div>
        <hr>
        <div class="row">
          <div class="col" style="padding-left:0;">ITEMS 3</div>
          <div class="col text-right">&dollar; <?php echo $total ?></div>
        </div>

        <button class="btn">CHECKOUT</button>
      </div>
    </div>
  </div>

</body