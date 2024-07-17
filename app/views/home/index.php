<?php require_once 'app/views/templates/header.php' ?>
<div class="container-fluid">
    <div class="page-header pt-3" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Welcome back, <?= $_SESSION['username'] ?>!</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>
