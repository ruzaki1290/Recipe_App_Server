<?php
// Define configuration options
// Bellow is allowing access from our React app which is being hosted on localhost:3000
$allowedOrigins= ['http://localhost:3000'];
$allowedHeaders = ['Content-Type'];
$allowedMethods = ['GET', 'POST', 'OPTIONS'];

// Set headers for CORS
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
if (in_array($origin, $allowedOrigins)) {
   header('Access-Control-Allow-Origin: ' . $origin);
}

header('Access-Control-Allow-Headers: ' . implode(', ', $allowedMethods));

if (isset('HTTP_ACCESS_CONTROL_REQUEST_HEADERS')) {
   $requestHeaders = explode(',', $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']);
   $requestHeaders = array_map(trim, $requestHeaders); // Trim whitespace from headers
   if (count(array_intersect($requestHeaders, $allowedHeaders)) == count($requestHeaders)) {
      header('Access-Control-Allow-Headers: ' . implode(', ', $requestHeaders));
   }
}
// header('Access-Control-Allow-Methods: ' . implode(',', $allowedMethods)

?>