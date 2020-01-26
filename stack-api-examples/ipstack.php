<?php 

// Set IP address and API access key  
$ip = '38.132.116.186'; 
// $ip = '136.253.18.15'; 

// $ip = '134.201.250.155,72.229.28.185,110.174.165.78';
// $ip = 'check';
$access_key = 'b5df878e1ede7944b827974325f6f3a3'; 
 
// API URL 
// $apiURL = 'http://api.ipstack.com/'.$ip.'?access_key='.$access_key;

$apiURL = sprintf('http://api.ipstack.com/%s?access_key=%s', $ip, $access_key);

// Initialize cURL 
$ch = curl_init(); 
 
// Set URL and other appropriate options 
curl_setopt($ch, CURLOPT_URL, $apiURL); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
// Execute and get response from API 
$json_resp = curl_exec($ch); 
 
// Close cURL 
curl_close($ch);

// Convert API json response to array 
$api_result = json_decode($json_resp, true);

echo '<pre>' . print_r($api_result, true) . '</pre>';

if($api_result['location']['country_flag']) {
    echo '<img src="'.$api_result['location']['country_flag'].'" border="1px" width="120px">';
}

?>

