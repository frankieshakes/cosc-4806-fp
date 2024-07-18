<?php

class Movie extends Controller {

    public function index() {
	    $this->view('movie/index');
    }

    public function search() {
      if (!isset($_REQUEST['movie'])) {
        // redirect to /movie
        
      }

      $title = $_REQUEST['movie'];

      $api = $this->model('Api');

      $movie = $api->search_movie($title);
      $review = $api->get_movie_review($title);

      echo '<pre>';
      print_r($movie);
      echo '</pre>';
      echo '<pre>';
      print_r($review);
      echo '</pre>';
      die;
    }

    public function add_rating($title = '', $rating = '') {
      
    }
}
