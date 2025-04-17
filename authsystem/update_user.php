<?php
session_start();
require_once "config.php";

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);   
    $age = $_POST['age'];
    $status = isset($_POST['status']) ? intval($_POST['status']) : 0;

    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $emailResult = $stmt->get_result();
    $emaildbresult = $emailResult->fetch_assoc(); 
    $emaildb = $emaildbresult['email'];
    $namedb = $emaildbresult['name'];
    $agedb = $emaildbresult['age'];
    $statusdb = $emaildbresult['status'];

    if (!empty($name) && !empty($email) && !empty($age)) {
        if((strtolower(trim($name)) !== strtolower(trim($namedb))) || (intval($age) !== intval($agedb)) || ($status !== $statusdb)){
            if (strtolower(trim($emaildb)) === strtolower(trim($email))) {
                if($age >= 18 && $age < 120){
                    $query = "UPDATE users SET name = ?, email = ?, age = ?, status = ? WHERE id = ?";
                    $stmt = $db->prepare($query);
                    $stmt->bind_param("ssiii", $name, $email, $age, $status, $id);
                    $stmt->execute();
                    $success .= 'Account wurde erfolgreich aktualisiert.';
                }else{
                    $error .= 'Das Alter muss zwischen 18 und 120 Jahren liegen.';
                }
            }else{
                $error .= 'Nutzer E-Mail Adresse kann nicht geändert werden.';
            }
        }else{
            $error .= 'Es wurden keine Änderungen gemacht.';
        }
    }else {
        $error .= 'Es dürfen keine Felder leer sein.';
    }
}else{
    $error .= 'Es ist ein unerwarteter Fehler aufgetreten.';
}
$_SESSION['success'] = $success;
$_SESSION['error'] = $error;
header("Location: profile.php");
?>