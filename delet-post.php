<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

require_once("../config/config.php");
require_once("../config/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
   http_response_code(200);
   exit();
}

if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
   http_response_code(405);
   echo json_encode(['message' => 'Method not allowed']);
   exit();
}

parse_str(file_get_contents("php://input"), $data);

if (!isset($data['id'])) {
   http_response_code(400);
   echo json_encode(['message' => 'Missing required parameter: id']);
   exit();
}

$id = filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT);

$stmt = $conn->prepare("DELETE FROM recipes WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
   http_response_code(200);
   echo json_encode(['message' => 'Post deleted successfully']);
} else {
   http_response_code(500);
   echo json_encode(['message' => 'Error deleting post: ' . $stmt->error]);
}

$stmt->close();
$conn->close();

?>