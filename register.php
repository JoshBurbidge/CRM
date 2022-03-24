<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Sign In</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">

  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  </style>

  <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <?php include("components/header.php")
  
  ?>

  <div class="content">
    <main class="form-signin">

      <form action="auth-register.php" method="post">
        <img class="mb-4" src="images/placeholder.jpg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Create Account</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="username">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="password">
          <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
        <!-- <button class="w-100 btn btn-lg btn-primary my-3" type="submit">Register</button> -->
        <p>Or <a href="login.php">Log In</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
      </form>
    </main>
  </div>


</body>

</html>