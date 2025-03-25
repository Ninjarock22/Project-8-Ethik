<?php
session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["userid"] === false) {
    header("location: login.php");
    exit;
}
require_once "config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Style in Stylesheet eintragen Überprüfen ob angemelden ansotzten redirect-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: flex;
            gap: 20px;
            width: 100%;
        }
        .profile-container, .messaging-container, .admin-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;

            h3, h2{
                margin-bottom: 20px;
            }
            .admin-container {
                display: none;
                width: 100%;
    
                textarea {
                    width: 100%;
                    height: 200px;
                }
            }
        }
        .profile-container .edit-btn, .profile-container .logout-btn, .messaging-container .message-btn, .admin-container .update-btn {
            background-color: #5c67f2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <?php
                $userid = $_SESSION["userid"];
                $query = "SELECT * FROM users WHERE id = ?";
                $stmt = $db->prepare($query);
                $stmt->bind_param("i", $userid);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
            ?>
            <h2>User Profile</h2>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email'])?></p>
            <p><strong>Full Name:</strong> <?= htmlspecialchars($user['name'])?></span></p>
            <p><strong>Age:</strong> <?= htmlspecialchars($user['age'])?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($user['status']
            ? 'Administrator'
            : 'Benutzer')?></p>
            <button class="logout-btn" onclick="logoutUser()">Logout</button>
        </div>
        <div class="messaging-container">
            <h3>Send a Message</h3>
            <textarea id="messageContent" placeholder="NOT Available" disabled></textarea><!-- Your message... -->
            <input type="text" id="messageTo" placeholder="" disabled> <!-- Recipient Username -->
            <button class="message-btn" onclick="sendMessage()" disabled>Send Message</button>
        </div>
        <?php
            if ($user['status'] == 1) {	
                ?>
                <div class="admin-container" id="adminPanel">
                    <h3>Admin Panel: View and Edit</h3>
                    <textarea disabled>NOT Available</textarea>
                </div>
                <?php
            }
        ?>
    </div>
    <script>
        function logoutUser() {
            window.location.href = 'http://localhost/Project-8-Ethik/authsystem/logout.php';
        }
    </script>
</body>
</html>