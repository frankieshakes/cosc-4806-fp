<ul class="rating-widget d-flex flex-row-reverse mb-0 p-0 gap-1">
  <li class="list-inline-item rating-star">
    <a href="/movie/rate/<?= urlencode($movie['Title']) ?>/5">&#9733;</a>
  </li>
  <li class="list-inline-item rating-star">
    <a href="/movie/rate/<?= urlencode($movie['Title']) ?>/4">&#9733;</a>
  </li>
  <li class="list-inline-item rating-star">
    <a href="/movie/rate/<?= urlencode($movie['Title']) ?>/3">&#9733;</a>
  </li>
  <li class="list-inline-item rating-star">
    <a href="/movie/rate/<?= urlencode($movie['Title']) ?>/2">&#9733;</a>
  </li>
  <li class="list-inline-item rating-star">
    <a href="/movie/rate/<?= urlencode($movie['Title']) ?>/1">&#9733;</a>
  </li>
</ul>
<style>
  .rating-widget .rating-star {
      font-size: 1.25em;
      margin: 0;
      padding: 0;
      color: var(--bs-gray-400);
  }

  .rating-widget .rating-star a {
    color: inherit;
    text-decoration: none;
  }

  .rating-star:hover,
  .rating-star:hover + .rating-star,
  .rating-star:hover + .rating-star + .rating-star,
  .rating-star:hover + .rating-star + .rating-star + .rating-star,
  .rating-star:hover + .rating-star + .rating-star + .rating-star + .rating-star {
    color: #faa;
  }
  
</style>