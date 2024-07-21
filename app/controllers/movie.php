<?php

class Movie extends Controller {

  private MovieReview $movieReview;

  function __construct() {
    $this->movieReview = $this->model('MovieReview');
  }

  public function index() {
    $this->view('movie/index');
  }

  public function search($title = '') {
    if ($_REQUEST['movie']) {
      $title = $_REQUEST['movie'];
      header('Location: /movie/search/' . urlencode($title));
      die;
    }

    // if no movie, redirect to /movie
    if (!isset($title)) {
      header('Location: /movie');
    }

    $api = $this->model('Api');
    $movieReview = $this->model('MovieReview');

    $movie = $api->search_movie($title);
    $review = $api->get_movie_review($title);
    $userRatings = $movieReview->getMovieRatings(urldecode($title));

    $this->view('movie/results', [
      'title' => $title, 
      'movie' => $movie, 
      'review' => $review, 
      'averageRating' => $userRatings['average_rating'],
      'hasRated' => $userRatings['has_rated'],
      'userRating' => $userRatings['user_rating']
    ]);
  }

  public function rate($title = '', $rating = '') {
    // get int value of the rating
    $rating = intval($rating);
    if ($rating > 0 && $rating <= 5) {
      $decodedTitle = urldecode($title);
      
      // submit and save rating to DB
      $movieReview = $this->model('MovieReview');
      if ($movieReview->rateMovie($decodedTitle, $rating)) {
        // return back to movie page
        header('Location: /movie/search/' . $title);
        die;
      }
    } else {
      header('Location: /movie');
      die;
    }
  }
}
