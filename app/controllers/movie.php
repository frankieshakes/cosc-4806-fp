<?php

class Movie extends Controller {

    public function index() {
	    $this->view('movie/index');
    }

    public function search() {
      if (!isset($_REQUEST['movie'])) {
        // redirect to /movie
        
      }

      $api = $this->model('Api');

      $title = $_REQUEST['movie'];
      $movie = $api->search_movie($title);

      // $review = $api->get_movie_review($title);

      echo '<pre>';
      print_r($movie);
      // print_r($review);
      die;
    }

    public function add_rating($title = '', $rating = '') {
      
    }
}
