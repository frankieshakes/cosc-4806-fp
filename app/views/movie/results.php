<?php require_once 'app/views/templates/headerNonAuth.php' ?>
<div class="container-fluid pb-5">

  <div class="row d-flex justify-content-center align-items-center h-100 pt-3">
    <div class="col col-lg-8 col-xl-6">
    <div class="card rounded-3 shadow-sm">
      <div class="card-body p-4">
        <h2 class="me-2">Results for <?= $data['title'] ?></h2>

        <form method="post" action="/movie/search" class="align-items-center d-flex gap-2">
          <div class="flex-grow-1">
            <label class="visually-hidden" for="inlineFormInputGroupUsername">Movie</label>
            <div class="input-group">
            <input type="text" name="movie" class="form-control" placeholder="Movie title" autocomplete="off"  />
            </div>
          </div>

          <div>
            <button type="submit" class="btn btn-primary btn-sm">Search movie</button>
          </div>
        </form>    

        
      </div>
    </div>
    </div>
  </div>
</div>

  <?php require_once 'app/views/templates/footer.php' ?>
