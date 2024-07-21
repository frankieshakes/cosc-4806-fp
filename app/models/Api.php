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
              "text" => "Provide a concise and captivating single-line review of the movie " . $title . ", followed by a concise review (no more than 2 paragraphs long). Do not use the word 'review' in the review. Keep it clean and family-friendly. Use the following string sequence to split the two sections: --|--"
            )
          )
        )
      )
    );

    $jsonPayload = json_encode($data);
    $jsonResponse = $this->post($this->aiUrl, $jsonPayload);

    // print_r($jsonResponse);

    $text = '';
    try {
        foreach ($jsonResponse['candidates'] as $candidate) {
          if (isset($candidate['content']['parts'])) {
            foreach ($candidate['content']['parts'] as $part) {
              $text .= $part['text'];
            }
          }
        }
    } catch (\Exception $e) {
      throw new \Exception('Error: Unable to parse response. ' . $e->getMessage());
    } finally {
        if (empty($text)) $text = '<censored>';
    }

    return $text;
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
