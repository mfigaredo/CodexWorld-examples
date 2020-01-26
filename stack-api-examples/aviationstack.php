<?php 

/**
 * Aviationstack Example
 */

$queryString = http_build_query([ 
    'access_key' => '659f9336be29975e5faeafea9fd61b51',
    'airline_name' => 'Interjet', 
]);

// API URL with query string 
$apiURL = sprintf('%s?%s', 'http://api.aviationstack.com/v1/flights', $queryString); 
 
// Initialize cURL 
$ch = curl_init(); 
 
// Set URL and other appropriate options 
curl_setopt($ch, CURLOPT_URL, $apiURL); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
// Execute and get response from API 
$api_response = curl_exec($ch); 
 
// Close cURL 
curl_close($ch);

// Convert API json response to array 
$api_result = json_decode($api_response, true);

// Output of the Flights data 
foreach ($api_result['data'] as $flight) { 
    if (!$flight['live']['is_ground']) { 
        echo sprintf("%s flight %s from %s (%s) to %s (%s) is in the air.", 
            $flight['airline']['name'], 
            $flight['flight']['iata'], 
            $flight['departure']['airport'], 
            $flight['departure']['iata'], 
            $flight['arrival']['airport'], 
            $flight['arrival']['iata'] 
            ), PHP_EOL; 
        echo '<br/>'; 
    } 
} 


?>
