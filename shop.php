<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Shop Homepage</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
</head>

<body>
  <?php include("components/header.php"); ?>
  <?php 
    include("model/Product.php");
    $products = getAllProducts();
    // foreach ($products as $product) {
    //   echo $product->name . " " . $product->price;
    // }
  ?>

  <!-- Header-->
  <header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Our Products</h1>
      </div>
    </div>
  </header>

  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <form class="mb-4" action="buy.php" method="post">
        <input type="hidden" name="products[]" value="1">
        <input type="hidden" name="products[]" value="2">
        <button class="btn btn-primary" type="submit">Buy something</button>
      </form>
      <div class="row gx-4 gx-lg-5 row-cols-3 row-cols-md-4 row-cols-xl-5 justify-content-center">

        <?php
          foreach ($products as $product) {
        ?>
        <div class="col mb-5">
          <div class="card h-100">
            <img class="card-img-top" src="images/<?php echo $product->image ?>" alt="product" />
            <div class="card-body p-4">
              <div class="d-flex flex-column align-items-center">
                <h5 class="card-title"><?php echo $product->name ?></h5>
                <div class="card-text"><?php echo $product->group ?></div>
                <div class="card-text"><?php echo $product->price ?></div>
                <a href="add-to-cart.php?id=<?php echo $product->id ?>"
                  class="btn btn-outline-primary">Add to Cart</a>
              </div>
            </div>


          </div>
        </div>

        <?php
          }
        ?>

      </div>


    </div>


  </section>



  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
    </div>
  </footer>

  <script>
  function addToCart() {

  }
  </script>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous">
  </script>

</body>

</html>