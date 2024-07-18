<?php

class MovieReview {
  public function __construct() {

  }

  public function rateMovie($title, $rating) {
    $db = db_connect();
    $stmt = $db->prepare("INSERT INTO movie_reviews (title, rating, user_id) VALUES (:title, :rating, :user_id)");
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':user_id', $_SESSION['user_id']);
    return $stmt->execute();
  }

  public function getMovieRatings($title) {
    $db = db_connect();
    // let's sum up all rows and return the average rating for the matching movie 
    $stmt = $db->prepare("SELECT AVG(rating) AS average_rating FROM movie_reviews WHERE title = :title");
    $stmt->bindValue(':title', $title);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}