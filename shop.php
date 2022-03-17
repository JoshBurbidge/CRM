<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <?php include("components/header.php"); 
  echo $_SERVER['REQUEST_URI'];  ?>
  <div class="container mt-4">
    <?php
  # get products from database

  for ($i=0; $i < 6; $i++) { 
    ?>
    <div class="row justify-content-evenly py-4">
      <?php
    for ($j=0; $j < 3; $j++) { 
    ?>

      <div class="col-3">

        <a href="#" class="text-decoration-none text-reset">
          <div class="card">
            <!-- <h3 class="card-header">Header</h3> -->
            <img class="card-img-top" src="images/placeholder.jpg" alt="image" width="100" height="100">
            <div class="card-body">
              <h3 class="card-title">Card Title</h3>
              <div class="card-text">Card Content</div>
            </div>
          </div>
        </a>

      </div>

      <?php } ?>

    </div>
    <?php } ?>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>