<?php 

$queryString = http_build_query([ 
    'access_key' => '76bf9e8b774ddb079814522626e29d5b', 
    'query' => 'codexworld', 
]);

// API URL with query string 
$apiURL = sprintf('%s?%s', 'http://api.serpstack.com/search', $queryString); 
 
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
$api_result = json_decode($api_response, true);

echo '<pre>' . print_r($api_result, true) . '</pre>';

?>
