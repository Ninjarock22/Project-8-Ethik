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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
        <link rel="stylesheet" href="../public/profilestylesheet.css">
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
            <div class="radio-input">
                <label class="label">
                    <input type="radio" id="value-1" name="value-radio" value="value-1" onclick="switchPanel('profilePanel')" />
                    <span class="text">Profile</span>
                </label>
                <label class="label">
                    <input type="radio" id="value-2" name="value-radio" value="value-2" onclick="switchPanel('messagingPanel')" />
                    <span class="text">Forum</span>
                </label>
                <label class="label">
                    <input type="radio" id="value-3" name="value-radio" value="value-3" onclick="switchPanel('aiGuidancePanel')" />
                    <span class="text">Ask AI</span>
                </label>
                <label class="label">
                    <input type="radio" id="value-4" name="value-radio" value="value-4" onclick="switchPanel('adminPanel')" />
                    <span class="text">Admin</span>
                </label>
            </div>
        </header>
        <div id="popup-menu" class="popup-menu">
            <div class="card3">
                <ul class="list">
                    <li class="element">
                        <a class="alighnment" href="index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#7e8590" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home">
                                <path d="M3 9.5L12 3l9 6.5"></path>
                                <path d="M9 22V12h6v10"></path>
                                <path d="M3 22h18"></path>
                            </svg>
                            <p class="label">Home</p>
                        </a>
                    </li>
                    <li class="element">
                        <a class="alighnment" href="register.php">
                            <svg class="lucide lucide-user-round-plus" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 21a8 8 0 0 1 13.292-6"></path>
                                <circle r="5" cy="8" cx="10"></circle>
                                <path d="M19 16v6"></path>
                                <path d="M22 19h-6"></path>
                            </svg>
                            <p class="label">Become Member</p>
                        </a>
                    </li>
                    <li class="element">
                        <a class="alighnment" href="index.php #services">
                            <svg class="lucide lucide-settings" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                                <circle r="3" cy="12" cx="12"></circle>
                            </svg>
                            <p class="label">Services</p>
                        </a>
                    </li>
                </ul>
                <div class="separator"></div>
                <ul class="list">
                    <li class="element delete">
                        <a class="alighnment" href="../public/about.html">
                            <svg class="lucide lucide-help-circle" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 1 1 5.91 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                            <p class="label">About</p>
                        </a>
                    </li>
                </ul>
                <div class="separator"></div>
                <ul class="list">
                    <li class="element">
                        <a class="alighnment" href="../public/team_access.html">
                            <svg class="lucide lucide-users-round" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 21a8 8 0 0 0-16 0"></path>
                                <circle r="5" cy="8" cx="10"></circle>
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"></path>
                            </svg>
                            <p class="label">Team Access</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <main class="main-container">
            <section>
                <div class="panel-container" id="profilePanel">
                    <h2>Profile Information</h2>
                    <div class="profile-container">
                        <?php
                        $userid = $_SESSION["userid"];
                        $query = "SELECT * FROM users WHERE id = ?";
                        $stmt = $db->prepare($query);
                        if (!$stmt) {
                            die("Database error: " . $db->error);
                        }
                        $stmt->bind_param("i", $userid);
                        if (!$stmt->execute()) {
                            die("Query execution failed: " . $stmt->error);
                        }
                        $result = $stmt->get_result();
                        $user = $result->fetch_assoc();
                        if (!$user) {
                            die("User not found.");
                        }
                        ?>
                        <h2>User Profile</h2>
                        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                        <p><strong>Full Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
                        <p><strong>Age:</strong> <?= htmlspecialchars($user['age']) ?></p>
                        <p><strong>Status:</strong> <?= htmlspecialchars($user['status'] ? 'Administrator' : 'Benutzer') ?></p>
                        <button class="logout-btn" onclick="logoutUser()">Logout</button>
                    </div>
                </div>
                <div class="panel-container" id="messagingPanel">
                    <h2>Forum</h2>
                    <div class="messaging-container">
                        <h3>Send a Message</h3>
                        <textarea id="messageContent" placeholder="NOT Available" disabled></textarea>
                        <input type="text" id="messageTo" placeholder="" disabled>
                        <button class="message-btn" onclick="sendMessage()" disabled>Send Message</button>
                    </div>
                </div>
                <div class="panel-container" id="aiGuidancePanel">
                    <h2>AI Guidance</h2>
                    <div class="ai-guidance-container">
                        <div id="chat-container">
                            <?php include "../public/chat.html"; ?>
                        </div>
                    </div>
                </div>
                <div class="panel-container" id="adminPanel">
                    <h2>Admin Panel</h2>
                    <div class="admin-container">
                        <?php if ($user['status'] == 1): ?>
                            <h3>Admin Panel: View and Edit</h3>
                            <textarea disabled>NOT Available</textarea>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <section id="contact">
                <h2>Contact Us</h2>
                <p>Feel free to reach out for more information.</p>
                <a href="mailto:info@project2.com">info@johannbehling.com</a>
                <p>&copy; 2025 Religion name All rights reserved.</p>
                <ul>
                    <li><a href="../public/Impressum.html">Impressum</a></li>
                    <li><a href="../public/Privacy Policy.html">Privacy Policy</a></li>
                    <li><a href="../public/Terms and Conditions.html">Terms of Service</a></li>
                </ul>
            </section>
        </footer>
        <script>
            function logoutUser() {
                window.location.href = '/Project-8-Ethik/authsystem/logout.php';
            }

            function togglePopupMenu() {
                var popupMenu = document.getElementById("popup-menu");
                popupMenu.classList.toggle("show");
            }

            function switchPanel(panelId) {
                const panel = document.querySelectorAll('.panel-container');
                panel.forEach(panel => panel.style.display = 'none');
                const targetPanel = document.getElementById(panelId);
                if (targetPanel) {
                    targetPanel.style.display = 'block';
                    sessionStorage.setItem('panelId', panelId);
                } else {
                    console.error(`Panel with ID "${panelId}" not found.`);
                }
            }

            window.addEventListener('load', function () {
                const panelId = sessionStorage.getItem('panelId');
                if (panelId) {
                    switchPanel(panelId);
                } else {
                    switchPanel('profilePanel');
                }
            });
        </script>
    </body>
</html>