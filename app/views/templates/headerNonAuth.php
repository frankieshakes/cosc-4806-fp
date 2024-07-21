<?php
  $loggedIn = false;

  if (isset($_SESSION['auth'])) {
    $loggedIn = true;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="icon" href="/favicon.png">
  <title>Ripened Tomatoes</title>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
  <meta name="viewport" content="width=device-width">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
</head>
<body class="py-4 bg-light">
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center align-items-center py-3 mb-4 border-bottom">
      <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none gap-2" href="/home">
        <img src="/public/img/logo.png" alt="Ripened Tomatoes logo" height="96" class="rounded">
        <span class="fs-4">Ripened Tomatoes</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
        <li class="nav-item">
          <?php if ($loggedIn): ?>
          <a href="/logout" class="nav-link">Logout</a>
          <?php else: ?>
          <a href="/login" class="nav-link">Login</a>
          <?php endif; ?>
        </li>
        </li>
      </ul>
      <span class="navbar-text">
        <?= $_SESSION['username'] ?>
      </span>
    </header>
  </div>