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
  <meta name="description" content="shopping cart template adapted from bbbootstrap.com">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
  <title>Cart</title>
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
        <?php 
        if (empty($products)) {
          echo "Your cart is empty";
        } else {
        foreach ($products as $product) { 
          $total = $total + $product->price;
          ?>

        <div class="row border-top border-bottom">
          <div class="row main align-items-center">
            <div class="col-2"><img class="img-fluid" src="images/<?php echo $product->image ?>">
            </div>
            <div class="col">
              <h2 class="row"><?php echo $product->name ?></h2>
              <div class="row"><?php echo $product->group ?></div>
            </div>
            <div class="col">quantity: 1</div>
            <div class="col">&dollar; <?php echo $product->price ?> </div>
          </div>
        </div>

        <?php } ?>
        <a href="clear-cart.php" class="btn btn-outline-danger mt-4">Clear Cart</a>
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
          <div class="col">Total</div>
          <div class="col text-right">&dollar; <?php echo $total ?></div>
        </div>

        <form action="buy.php" method="post">
          <?php foreach ($products as $product) { ?>
          <input type="hidden" name="products[]" value="<?php echo $product->id?>">
          <?php } ?>
          <button class="btn btn-primary" type="submit"
            <?php echo empty($products) ? "disabled" : "" ?>>CHECKOUT</button>
        </form>
      </div>
    </div>
  </div>

</body