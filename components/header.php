<?php 
$uri = explode("/", $_SERVER['REQUEST_URI']);
$page = end($uri);
// echo $_SERVER['REQUEST_URI'];
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <a class="navbar-brand nav-link" href="#">Logo</a>

  <ul class="navbar-nav">
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
</nav>