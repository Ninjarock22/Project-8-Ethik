<?php
session_start();
require_once "config.php";

$success = '';
$error = '';

$data = json_decode(file_get_contents("php://input"), true); 

if (isset($data['messagetext'])) {
    $messagetext = $data['messagetext'];
    $id = $_SESSION['userid'];
    $showentry = 1;
    
    if(empty($messagetext)){
        $error .= 'Es dürfen keine Felder leer sein.';
    }else{
        if(strlen($messagetext) > 1000){
            $error .= 'Die Nachricht darf maximal 1000 Zeichen lang sein.';
        }else{
            $stmt = $db->prepare("INSERT INTO forum (idnutzer, messagetext, showentry) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $id, $messagetext, $showentry);
            $stmt->execute();
            $success .= 'Nachricht wurde erfolgreich gesendet.';
        }
    }
}else{
    $error .= 'Es ist ein unerwarteter Fehler aufgetreten.';
}

if (!empty($success)) {
echo json_encode(['status' => 'success', 'message' => $success]);
} else {
echo json_encode(['status' => 'error', 'message' => $error]);
}
mysqli_close($db);
?>