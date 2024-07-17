<?php
if (!isset($_SESSION['auth'])) {
    header('Location: /login');
}

$is_admin = $_SESSION['is_admin'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
      <link href="/public/css/reports.css" rel="stylesheet">
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
    </head>
    <body class="py-4 bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home">
      <img src="/public/img/reminders-logo.png" alt="COSC 4806" height="64" class="rounded">
      COSC 4806
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if ($is_admin): ?>
        <li class="nav-item">
          <a class="nav-link" href="/reports">Reports</a>
        </li>                
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="/reminders">Reminders</a>
        </li>                
      </ul>
      <div class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>