<?php
require_once 'config.php';

$success = '';
$error = '';

$data = json_decode(file_get_contents("php://input"), true); 

if (isset($data['messageid'])) {
    $messageid = $data['messageid'];
    
    if(empty($messageid)){
        $error .= 'Es dürfen keine Felder leer sein.';
    }else{
        $stmt = $db->prepare("UPDATE forum SET deleteentry = 1 WHERE id = ?");
        $stmt->bind_param("i", $messageid);
        if ($stmt->execute()) {
            $success .= 'Nachricht wurde erfolgreich gelöscht.';
        } else {
            $error .= 'Fehler beim Löschen der Nachricht.';
        }
    }
} else {
    $error .= 'Es ist ein unerwarteter Fehler aufgetreten.';
}
echo json_encode(['status' => !empty($success) ? 'success' : 'error', 'message' => !empty($success) ? $success : $error]);
?>