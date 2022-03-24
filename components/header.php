<?php 
$uri = explode("/", $_SERVER['REQUEST_URI']);
$page = end($uri);
// echo $_SERVER['REQUEST_URI'];
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand nav-link" href="#">Logo</a>

    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a href="." class="nav-link <?php echo $page == "" ? "active" : "" ?>">
          Home
        </a>
      </li>

      <li class="nav-item">
        <a href="shop.php" class="nav-link <?php echo $page == "shop.php" ? "active" : "" ?>">
          Shop
        </a>
      </li>
    </ul>

    <?php if ($_COOKIE["userId"]) :?>
    <!-- if no user is logged in -->
    <div class="d-flex me-2 navbar-nav">
      <button class="btn btn-outline-light">
        <a href="login.php" class="text-decoration-none text-reset">Log In</a>
      </button>
    </div>

    <?php else: ?>
    <!-- if user is logged in -->
    <div class="d-flex me-2 navbar-nav">
      <button class="btn btn-outline-light">
        <a href="#" class="text-decoration-none text-reset">Profile</a>
      </button>
    </div>
    <?php endif ?>

  </div>
</nav>
<!-- <?php if ($_COOKIE["userId"]) echo $_COOKIE["userId"] ?> -->