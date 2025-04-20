<?php
require_once 'config.php';

$success = '';
$error = '';

$data = json_decode(file_get_contents("php://input"), true); 

if (isset($data['goalid'])) {
    $id = $data['goalid'];

    $stmt = $db->prepare("SELECT * FROM goals WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $error .= 'Ziel nicht gefunden.';
    } else {
        $stmt->close();

        $stmt = $db->prepare("DELETE FROM goals WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $success .= 'Ziel wurde erfolgreich gelöscht.';
        } else {
            $error .= 'Fehler beim Löschen.';
        }
    }
} else {
    $error .= 'ID nicht gefunden.';
}
echo json_encode(['status' => !empty($success) ? 'success' : 'error', 'message' => !empty($success) ? $success : $error]);
?>