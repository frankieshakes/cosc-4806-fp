<?php require_once 'app/views/templates/headerNonAuth.php' ?>
<?php
  // shortcuts
  $movie = $data['movie'];
  
?>
<div class="container pb-5">

  <div class="row d-flex justify-content-center align-items-center h-100 pt-3">
    <div class="col col-lg-6">
      <?php include('app/views/partials/searchForm.php') ?>
    </div>
  </div>

  <div class="row mt-5 mb-3">
    <div class="col col-lg-10 offset-lg-1">
      <div class="d-flex justify-content-between align-items-end align-self-stretch mb-3">
        <div>
          <h2 class="display-5 link-body-emphasis mb-1"><?= $movie['Title'] ?></h2>
          <p class="text-success mb-1">Ripened Tomatoes <span class="text-success fw-semibold">Freshness Meter</span>: 
            <?php if ($data['averageRating']): ?>
              <span class="fw-semibold"><?= round($data['averageRating']) ?>/5</span>
            <?php else: ?>
              <span class="text-success text-opacity-75">Not yet rated</span>
            <?php endif; ?>
          </p>
          <?php if ($loggedIn): ?>
            <div class="d-flex align-items-center gap-2">
              <?php if ($data['hasRated']): ?>
                <div>Your rating:</div>
                <div class="fw-semibold"><?= $data['userRating'] ?>/5</div>
              <?php else: ?>
                <div>Rate this movie:</div>
                <div>
                  <?php include('app/views/partials/ratings.php') ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
        <div>
          <img src="<?= $movie['Poster'] ?>" class="img-thumbnail shadow-sm" alt="<?= $movie['Title'] ?> poster" width="100px">
        </div>
      </div>
    </div>
      
    <div class="col col-lg-10 offset-lg-1">
      <div class="row">      
        <div class="col-lg-6">

          <h3 class="display-6 text-body-secondary">Plot</h3>
          <p><?= $movie['Plot'] ?></p>

          <h3 class="display-6 text-body-secondary">Movie Review</h3>
          <?php if ($data['review']): ?>
            <?php
              // Split the string by the pipe character
              $parts = explode('--|--', $data['review']);
            ?>
            <blockquote class="blockquote">
              <p class="fw-lighter fst-italic"><?= $parts[0] ?></p>
            </blockquote>
            <p><?= $parts[1] ?></p>
          <?php else: ?>
            No reviews are currently available for this movie. Try again later.
          <?php endif; ?>
          
        </div>
        
        <div class="col-lg-6">
          
          <div class="card shadow-sm mt-3">
            <div class="card-header">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square-fill text-success" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
              </svg>
              Movie Overview
            </div>
            <div class="card-body">
              <h5 class="card-title">Release Date</h5>
              <p><?= $movie['Released'] ?></p>

              <h5 class="card-title">Cast</h5>
              <p><?= $movie['Actors'] ?></p>

              <h5 class="card-title">Director</h5>
              <p><?= $movie['Director'] ?></p>

              <h5 class="card-title">Writer</h5>
              <p><?= $movie['Writer'] ?></p>

            </div>
          </div>
        </div>
      </div>

      <hr class="border-top border-1 border-dark mb-0">
      <hr class="border-top border-1 border-light-subtle mt-0">

      <div class="row mt-4">
        <div class="col-lg-6">
          <div>
            <h5>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-detailed-fill text-success" viewBox="0 0 16 16">
                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5m0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5M4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1"/>
              </svg>
              Movie Details
            </h5>
            <ul class="list-group list-group-flush bg-">
              <li class="list-group-item bg-light">
                Genre: <span class="text-secondary"><?= $movie['Genre'] ?></span>
              </li>
              <li class="list-group-item bg-light">
                Rating: <span class="text-secondary"><?= $movie['Rated'] ?></span>
              </li>
              <li class="list-group-item bg-light">
                Box Office Revenue: <span class="text-secondary"><?= $movie['BoxOffice'] ?></span>
              </li>
              <li class="list-group-item bg-light">
                Language: <span class="text-secondary"><?= $movie['Language'] ?></span>
              </li>
              <li class="list-group-item bg-light">
                Country: <span class="text-secondary"><?= $movie['Country'] ?></span>
              </li>
              <li class="list-group-item bg-light">
                Runtime: <span class="text-secondary"><?= $movie['Runtime'] ?></span>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="col-lg-6">
          <div>
            <h5>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer text-success" viewBox="0 0 16 16">
                <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
                <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0"/>
              </svg>
              Other Ratings
            </h5>
            <ul class="list-group list-group-flush bg-">
              <?php foreach ($movie['Ratings'] as $rating): ?>
              <li class="list-group-item bg-light">
                <?= $rating['Source'] ?>: <span class="text-secondary"><?= $rating['Value'] ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

  <?php require_once 'app/views/templates/footer.php' ?>
