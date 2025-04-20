<?php
session_start();
require_once "config.php";

$success = '';
$error = '';

$data = json_decode(file_get_contents("php://input"), true); 

if (isset($data['problem'])) {
    $problem = $data['problem'];
    $goal = $data['goal'];
    $way1 = $data['way1'];
    $way2 = $data['way2'];
    $way3 = $data['way3'];
    $id = $_SESSION['userid'];
    $userid = $_SESSION['userid'];
    
    $stmt = $db->prepare("SELECT * FROM goals WHERE idnutzer = ?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows >= 3) {
        $error .= 'Sie haben das Limit an Zielen erreicht.';
    }else{
        $stmt->close();
        if(empty($problem) || empty($goal) || empty($way1) || empty($way2) || empty($way3)){
            $error .= 'Es dürfen keine Felder leer sein.';
        }else{
            if(strlen($problem) > 1001 || strlen($goal) > 1001 || strlen($way1) > 1001 || strlen($way2) > 1001 || strlen($way3) > 1001){
                $error .= 'Der Inhalt darf maximal 1000 Zeichen lang sein.';
            }else{
                $stmt = $db->prepare("INSERT INTO goals (idnutzer, problem, goal, way1, way2, way3) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("isssss", $id, $problem, $goal, $way1, $way2, $way3);
                $stmt->execute();
                $success .= 'Ziel wurde erfolgreich gespeichert.';
            }
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