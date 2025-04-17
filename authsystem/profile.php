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
        <link rel="icon" type="image/x-icon" href="../logo.ico">
        <title>User Profile</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <input type="radio" id="value-1" name="value-radio" value="value-1" onclick="switchPanel('meineZielePanel')" />
                    <span class="text">Ziele</span>
                </label>
                <label class="label">
                    <input type="radio" id="value-2" name="value-radio" value="value-2" onclick="switchPanel('forumPanel')" />
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
                <div class="panel-container" id="meineZielePanel" style="display: none;">
                    <h2>Meine Ziele</h2>
                    <div class="meineZiele-container">
                        <form id="meineZieleForm">
                            <h3>1. Beschreiben Sie Ihr Problem</h3>
                            <label for="problem">Problem:</label>
                            <textarea id="problem" name="problem" placeholder="Beschreiben Sie Ihr Problem..." required></textarea>

                            <h3>2. Beschreiben Sie Ihr Ziel</h3>
                            <label for="goal">Ziel:</label>
                            <textarea id="goal" name="goal" placeholder="Beschreiben Sie Ihr Ziel..." required></textarea>

                            <h3>3. Wege, um Ihr Ziel zu erreichen</h3>
                            <label for="way1">Weg 1:</label>
                            <textarea id="way1" name="way1" placeholder="Beschreiben Sie den ersten Weg, Ihr Ziel zu erreichen..." required></textarea>

                            <label for="way2">Weg 2:</label>
                            <textarea id="way2" name="way2" placeholder="Beschreiben Sie den zweiten Weg, Ihr Ziel zu erreichen..." required></textarea>
                            
                            <label for="way3">Weg 2:</label>
                            <textarea id="way3" name="way2" placeholder="Beschreiben Sie den dritten Weg, Ihr Ziel zu erreichen..." required></textarea>
                            
                            <button type="button" onclick="saveZiele()">Speichern</button>
                        </form>

                        <h3>Ihre Ziele</h3>
                        <div id="zieleList">
                            <!-- User's goals will be displayed here -->
                        </div>
                    </div>
                </div>
                <div class="panel-container" id="forumPanel" style="display: none;">
                    <h2>Forum</h2>
                    <div class="forum-chat-wrapper">
                        <div class="forum-chat-container">
                            <div id="forum-chat-box"></div>
                            <div class="forum-input-container">
                                <input id="forum-message-input" type="text" placeholder="Type a message...">
                                <button id="forum-send-btn" class="forum-send-btn">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-container" id="aiGuidancePanel" style="display: none;">
                    <h2>AI Guidance</h2>
                    <div class="chat-wrapper">
                        <div class="chat-container">
                            <div id="chat-box"></div>
                            <div class="input-container">
                                <input id="message-input" type="text" placeholder="Type a message...">
                                <button id="send-btn" class="send-btn">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-container" id="adminPanel" style="display: none;">
                    <h2>Admin Panel</h2>
                    <div class="admin-container">
                        <?php if ($user['status'] == 1): ?>
                            <h3>Manage Users</h3>
                            <div id="user-list">
                                <?php
                                $query = "SELECT * FROM users";
                                $result = $db->query($query);
                                if ($result->num_rows > 0):
                                    while ($row = $result->fetch_assoc()): ?>
                                        <div class="user-card" id="user-<?= $row['id'] ?>">
                                            <div class="user-info">
                                                <span><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></span>
                                                <span><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></span>
                                            </div>
                                            <div class="action-buttons">
                                                <button class="action-btn" onclick="editUser(<?= $row['id'] ?>)">Edit</button>
                                                <button class="action-btn delete-btn" onclick="deleteUser(<?= $row['id'] ?>)">Delete</button>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                else: ?>
                                    <p>No users found.</p>
                                <?php endif; ?>
                            </div>
                            <div id="edit-user-form" style="display: none;">
                                <h3>Edit User</h3>
                                <form id="editForm" method="POST" action="update_user.php">
                                    <input type="hidden" name="id" id="edit-user-id">
                                    <label for="edit-name">Name:</label>
                                    <input type="text" name="name" id="edit-name" required>
                                    <label for="edit-email">Email:</label>
                                    <input type="email" name="email" id="edit-email" required>
                                    <label for="edit-age">Age:</label>
                                    <input type="number" name="age" id="edit-age" required>
                                    <label for="edit-status">Status:</label>
                                    <select name="status" id="edit-status">
                                        <option value="0">Benutzer</option>
                                        <option value="1">Administrator</option>
                                    </select>
                                    <button type="submit">Submit</button>
                                    <button type="button" onclick="cancelEdit()">Cancel</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <p>You do not have access to this panel.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <section id="contact">
                <h2>Contact Us</h2>
                <p>Feel free to reach out for more information.</p>
                <a href="mailto:johann.behling@outlook.com">info@johannbehling.com</a>
                <p>&copy; 2025 Religion name All rights reserved.</p>
                <ul>
                    <li><a href="../public/Impressum.html">Impressum</a></li>
                    <li><a href="../public/PrivacyPolicy.html">Privacy Policy</a></li>
                    <li><a href="../public/TermsandConditions.html">Terms of Service</a></li>
                </ul>
            </section>
        </footer>
        <script>
            function logoutUser() {
                window.location.href = '/Project-8-Ethik/authsystem/logout.php';
            }

            function togglePopupMenu() {
                //var popupMenu = document.getElementById("popup-menu");
                //popupMenu.classList.toggle("show");
                Swal.fire({
                    title: 'Info',
                    text: 'Das Menü ist aktuell deaktiviert.',
                    icon: 'warning',
                    background: '#333',
                    color: 'white',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
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

            const messages = [
                { avatar: "https://em-content.zobj.net/thumbs/240/apple/325/robot_1f916.png", name: "AI", text: "Hello! How can I assist you today?", type: "ai" },
            ];

            function renderMessages() {
                const chatBox = document.getElementById("chat-box");
                chatBox.innerHTML = "";
                messages.forEach(msg => {
                    const msgDiv = document.createElement("div");
                    msgDiv.className = `message ${msg.type}`;
                    msgDiv.innerHTML = `
                        ${msg.type !== "user" ? `<img src="${msg.avatar}" class="avatar">` : ""}
                        <div class="text">${msg.text}</div>
                        ${msg.type === "user" ? `<img src="${msg.avatar}" class="avatar">` : ""}
                    `;
                    chatBox.appendChild(msgDiv);
                });

                chatBox.scrollTop = chatBox.scrollHeight;
            }

            document.getElementById("send-btn").addEventListener("click", () => {
                const input = document.getElementById("message-input");
                if (input.value.trim() !== "") {
                    // User message
                    messages.push({ avatar: "https://em-content.zobj.net/thumbs/240/apple/325/bust-in-silhouette_1f464.png", name: "You", text: input.value, type: "user" });

                    // AI response
                    messages.push({ avatar: "https://em-content.zobj.net/thumbs/240/apple/325/robot_1f916.png", name: "AI", text: "This feature is not yet supported!", type: "ai" });
                    messages.push({ avatar: "https://em-content.zobj.net/thumbs/240/apple/325/robot_1f916.png", name: "AI", text: "The AI is still being trained!", type: "ai" });
                    messages.push({ avatar: "https://em-content.zobj.net/thumbs/240/apple/325/robot_1f916.png", name: "AI", text: "Our Team is working day and night to perfect its responses!", type: "ai" });

                    input.value = "";
                    renderMessages();
                }
            });

            document.getElementById("message-input").addEventListener("keypress", (event) => {
                if (event.key === "Enter") {
                    document.getElementById("send-btn").click();
                }
            });

            renderMessages();

            function editUser(userId) {
                const userCard = document.getElementById(`user-${userId}`);
                const name = userCard.querySelector('p:nth-child(1)').textContent.split(': ')[1];
                const email = userCard.querySelector('p:nth-child(2)').textContent.split(': ')[1];

                document.getElementById('edit-user-id').value = userId;
                document.getElementById('edit-name').value = name;
                document.getElementById('edit-email').value = email;

                document.getElementById('user-list').style.display = 'none';
                document.getElementById('edit-user-form').style.display = 'block';
            }

            function cancelEdit() {
                document.getElementById('edit-user-form').style.display = 'none';
                document.getElementById('user-list').style.display = 'block';
            }

            function deleteUser(userId) {
                if (confirm('Are you sure you want to delete this user?')) {
                    fetch(`delete_user.php?id=${userId}`, { method: 'GET' })
                        .then(response => response.text())
                        .then(data => {
                            if (data === 'success') {
                                document.getElementById(`user-${userId}`).remove();
                                alert('User deleted successfully.');
                            } else {
                                alert('Failed to delete user.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            }

            function saveZiele() {
                const problem = document.getElementById("problem").value.trim();
                const goal = document.getElementById("goal").value.trim();
                const way1 = document.getElementById("way1").value.trim();
                const way2 = document.getElementById("way2").value.trim();
                const way3 = document.getElementById("way3").value.trim();

                if (!problem || !goal || !way1 || !way2) {
                    alert("Bitte füllen Sie alle Felder aus.");
                    return;
                }

                const zieleList = document.getElementById("zieleList");

                // Create a new goal entry
                const zieleEntry = document.createElement("div");
                zieleEntry.className = "ziele-entry";
                zieleEntry.innerHTML = `
                    <p><strong>Problem:</strong> ${problem}</p>
                    <p><strong>Ziel:</strong> ${goal}</p>
                    <p><strong>Weg 1:</strong> ${way1}</p>
                    <p><strong>Weg 2:</strong> ${way2}</p>
                    <p><strong>Weg 3:</strong> ${way3}</p>
                    <button onclick="deleteZiele(this)">Löschen</button>
                `;

                // Append the new entry to the list
                zieleList.appendChild(zieleEntry);

                // Clear the form
                document.getElementById("meineZieleForm").reset();
            }

            function deleteZiele(button) {
                const entry = button.parentElement;
                entry.remove();
            }
        </script>
        <script>
            document.querySelectorAll('textarea').forEach(textarea => {
                textarea.addEventListener('input', function () {
                    this.style.height = 'auto'; // Setze die Höhe zurück
                    this.style.height = this.scrollHeight + 'px'; // Passe die Höhe an den Inhalt an
                });
            });
        </script>
    </body>
</html>