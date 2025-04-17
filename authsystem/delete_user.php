<?php
require_once "config.php";
session_start();

$error = '';
$success = '';
$data = json_decode(file_get_contents("php://input"), true); 

if ($_SESSION["userid"] == ($data['userId'])) {
    $error .= 'Du kannst dich nicht selbst löschen.';
} else {
    if (isset($data['userId'])) {
        $id = $data['userId'];

        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 0) {
            $error .= 'Nutzer nicht gefunden.';
        } else {
            $stmt->close();

            $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $success .= 'Account wurde erfolgreich gelöscht.';
            } else {
                $error .= 'Fehler beim Löschen.';
            }
        }
    } else {
        $error .= 'ID nicht gefunden.';
    }
}

if (!empty($success)) {
    echo json_encode(['status' => 'success', 'message' => $success]);
} else {
    echo json_encode(['status' => 'error', 'message' => $error]);
}
mysqli_close($db);
?>