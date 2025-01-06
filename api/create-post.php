<?php

// Create post code will go here

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Origin: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require_once("../config/config.php");
require_once("../config/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
   http_response_code(200);
   exit();
}

// retrieve the request body as a string
$request_body = file_get_contents('php://input');

// decode the JSON data into a PHP array
$data = json_decode($request_body, true);

// validate input fields with basic validation(checking if empty)
if(empty($data['title']) || empty($data['author']) || empty($data['ingredients']) || empty($data['instructions'])) {
   http_response_code(400);
   echo json_encode(['message' => 'Error: Missing or empty required parameter']);
   exit();
}

// validate input fields(checking for null values)
if(!isset($data['title']) || !isset($data['author']) || !isset($data['ingredients']) || !isset($data['instructions'])) {
   http_response_code(400);
   die(json-encode(['message' => 'Error: Missin or empty reauired parameter']));
}

// sanitize input
$title = filter_var($data['title'], FILTER_SANITIZE_STRING);
$author = filter_var($data['author'], FILTER_SANITIZE_STRING);
$ingredients = filter_var($data['ingredients'], FILTER_SANITIZE_STRING);
$instructions = filter_var($data['instructions'], FILTER_SANITIZE_STRING);

// prepare statement
$stmt = $conn->prepare("INSERT INTO recipes(title, author, ingredients, instructions) VALUES(?, ?, ?, ?)");
$stmt->bind_param("ssss", $title, $author, $ingredients, $instructions);

// execute statement
if ($stmt->execute()) {
   $id = $stmt->insert_id;

   // return success response    
   http_response_code(201);
   die(json-encode(['message' => 'Post created successfully', 'id' => $id]));

} else {
   // return error response with more detail if possible
   http_response_code(500);
   echo json-encode(['message' => 'Error creating post: ' . $stmt->error]);
}


$stmt->close();
$conn->close();

?>