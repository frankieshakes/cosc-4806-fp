<?php

class Api {

  private $omdbUrl;
  private $aiUrl;
  
  public function __construct() {
    $this->omdbUrl = "http://www.omdbapi.com/?apikey=" . $_ENV['OMDB_KEY'];
    
    $this->aiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=" . $_ENV['GEMINI_KEY'];
  }

  public function search_movie($title) {
    return $this->get($this->omdbUrl . "&t=" . urlencode($title));
  }

  public function get_movie_review($title) {
    $data = array(
      "contents" => array(
        array(
          "role" => "user",
          "parts" => array(
            array(
              "text" => "Provide a concise review for the movie " . $title . "."
            )
          )
        )
      )
    );

    $jsonPayload = json_encode($data);

    return $this->post($this->aiUrl, $jsonPayload);
  }

  private function get($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $url);
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if (curl_errno($curl)) {
      echo 'Error:' . curl_error($curl);
      die;
    }

    return json_decode($response, true);
  }

  private function post($url, $data) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $response = curl_exec($curl);

    curl_close($curl);
    if (curl_errno($curl)) {
      echo 'Error:' . curl_error($curl);
      die;
    }

    return json_decode($response, true);
  }
  
}
