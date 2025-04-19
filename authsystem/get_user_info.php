<?php
require_once 'config.php';

if (!isset($_GET['id'])) {
    echo json_encode(['error' => 'No ID']);
    exit;
}

$id = intval($_GET['id']);

$query = "SELECT id, name, status FROM users WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

echo json_encode([
    'id' => $user['id'],
    'name' => $user['name'],
    'status' => (int)$user['status']
]);
?>
