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
    <link rel="stylesheet" href="../public/extrastylesheet.css">
</head>
<body>
    <header>
        <div class="popup-icon" onclick="togglePopupMenu()">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </div>
    </header>
    <main>
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
                    <div class="admin-container" id="adminPanel" style="display: block;">
                        <h3>Admin Panel: View and Edit</h3>
                        <textarea disabled>NOT Available</textarea>
                    </div>
                    <?php
                }
            ?>
        </div>
    </main>
    <footer>
        <section id="contact">
            <h2>Contact Us</h2>
            <p>Feel free to reach out for more information.</p>
            <a href="mailto:info@project2.com">info@johannbehling.com</a>
        </section>
        <p>&copy; 2025 Religion name All rights reserved.</p>
        <ul>
            <li><a href="Impressum.html">Impressum</a></li>
            <li><a href="Privacy Policy.html">Privacy Policy</a></li>
            <li><a href="Terms and Conditions.html">Terms of Service</a></li>
        </ul>
    </footer>
    <script src="js/carousel.js"></script>
    <script src="js/Smooth-scrolling-behavior.js"></script>
    <script src="js/Buttonlink.js"></script>
    <script>
        function logoutUser() {
            window.location.href = 'http://localhost/Project-8-Ethik/authsystem/logout.php';
        }

        function togglePopupMenu() {
            var popupMenu = document.getElementById("popup-menu");
            popupMenu.classList.toggle("show");
        }
    </script>
</body>
</html>