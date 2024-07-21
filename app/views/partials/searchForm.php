<div class="card rounded-2 shadow">
  <div class="card-body p-4">
    <h2 class="me-2">Movie Search</h2>

    <form method="post" action="/movie/search" class="align-items-center d-flex gap-2">
      <div class="flex-grow-1">
        <label class="visually-hidden" for="inlineFormInputGroupUsername">Movie</label>
        <div class="input-group">
        <input type="text" name="movie" class="form-control" placeholder="Movie title" autocomplete="off" value="<?= urldecode($data['title']) ?>"  />
        </div>
      </div>

      <div>
        <button type="submit" class="btn btn-primary btn-sm">Search movie</button>
      </div>
    </form>    
  </div>
</div>