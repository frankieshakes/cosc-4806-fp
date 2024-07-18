<?php

class Movie extends Controller {

  private MovieReview $movieReview;

  function __construct() {
    $this->movieReview = $this->model('MovieReview');
  }

  public function index() {
    $this->view('movie/index');
  }

  public function search() {
    if (!isset($_REQUEST['movie'])) {
      // redirect to /movie
      header('Location: /movie');
      die;
    }

    $title = $_REQUEST['movie'];

    $api = $this->model('Api');

    $movie = $api->search_movie($title);
    $review = $api->get_movie_review($title);

    $this->view('movie/results', ['title' => $title, 'movie' => $movie, 'review' => $review]);


    // echo '<pre>';
    // print_r($movie);
    // echo '</pre>';
    // echo '<pre>';
    // print_r($review);
    // echo '</pre>';
    // die;
  }

  public function rate($title = '', $rating = '') {
    echo '<pre>';
    echo $title . " / " . $rating;
    echo '<br />';      
    $rating = intval($rating);
    if ($rating > 0 && $rating <= 5) {
      echo "movie rated: " . $rating;
    } else {
      echo "invalid rating";
    }
    die;
  }
}
