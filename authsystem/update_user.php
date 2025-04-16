<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $status = $_POST['status'];

    $query = "UPDATE users SET name = ?, email = ?, age = ?, status = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssiii", $name, $email, $age, $status, $id);

    if ($stmt->execute()) {
        header("Location: profile.php");
    } else {
        echo "Error updating user: " . $stmt->error;
    }
}
?>