<?php 

/**
 * Forward Geocoding
 */

$apiKey = '973ba74d651ec882269c33bff64dd9e4';

?>
<h3>Forward Geocoding</h3>
<?php

$queryString = http_build_query([ 
    'access_key' => $apiKey,  
    'query' => '1600 Pennsylvania Ave NW', 
    'region' => 'Washington', 
    'output' => 'json', 
    'limit' => 1, 
  ]);

// API URL with query string  
$apiURL = sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString);  
  
// Create a new cURL resource  
$ch = curl_init();  
  
// Set URL and other appropriate options  
curl_setopt($ch, CURLOPT_URL, $apiURL);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  
// Execute and get response from API  
$api_response = curl_exec($ch);  
  
// Close cURL resource  
curl_close($ch);

// Convert API json response to array  
$apiResult = json_decode($api_response, true);

echo '<pre>' . print_r($apiResult, true) . '</pre>';

echo '<hr>';

/**
 * Reverse Geocoding
 */

 ?>
 <h3>Reverse Geocoding</h3>
 <?php

$queryString = http_build_query([ 
    'access_key' => $apiKey,  
    'query' => '48.2084,16.3731', 
    // 'language' => 'ES', 
    'limit' => 10,
    'output' => 'json',
  ]);

// API URL with query string  
$apiURL = sprintf('%s?%s', 'http://api.positionstack.com/v1/reverse', $queryString);  
  
// Create a new cURL resource  
$ch = curl_init();  
  
// Set URL and other appropriate options  
curl_setopt($ch, CURLOPT_URL, $apiURL);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  
// Execute and get response from API  
$api_response = curl_exec($ch);  
  
// Close cURL resource  
curl_close($ch);  

// Convert API json response to array  
$apiResult = json_decode($api_response, true);

echo '<pre>' . print_r($apiResult, true) . '</pre>';

?>
