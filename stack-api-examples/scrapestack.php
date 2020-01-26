<?php 

$queryString = http_build_query([ 
    'access_key' => '1c0a1d35dec8f5888737d235fafe3e25', 
    'url' => 'https://www.cinepolis.com', 
]);

// API URL with query string 
$apiURL = sprintf('%s?%s', 'http://api.scrapestack.com/scrape', $queryString); 
 
// Create a new cURL resource 
$ch = curl_init(); 
 
// Set URL and other appropriate options 
curl_setopt($ch, CURLOPT_URL, $apiURL); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
// Execute and get response from API 
$website_content = curl_exec($ch); 
 
// Close cURL resource 
curl_close($ch);

// Render website content 
echo '<textarea rows="200" cols="400">';
echo $website_content;
echo '</textarea>';
?>
