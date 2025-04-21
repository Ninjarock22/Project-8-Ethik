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
        <link rel="icon" type="image/x-icon" href="../images/icons/logo.ico">
        <meta name="description" content="Egoinfinitura- A new religion based on common sense and self-optimization. Join us to become the best version of yourself while living in a supportive community.">
    <meta name="keywords" content="Religion, Self-Optimization, Community, Support, Common Sense">
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
                    <input type="radio" id="1" name="value-radio" value="1" onclick="switchPanel('profilePanel')" />
                    <span class="text">Profile</span>
                </label>
                <label class="label">
                    <input type="radio" id="2" name="value-radio" value="2" onclick="switchPanel('meineZielePanel')" />
                    <span class="text">Goals</span>
                </label>
                <label class="label">
                    <input type="radio" id="3" name="value-radio" value="3" onclick="switchPanel('forumPanel')" />
                    <span class="text">Forum</span>
                </label>
                <label class="label">
                    <input type="radio" id="4" name="value-radio" value="4" onclick="switchPanel('aiGuidancePanel')" />
                    <span class="text">Ask AI</span>
                </label>
                <label class="label">
                    <input type="radio" id="5" name="value-radio" value="5" onclick="switchPanel('adminPanel')" />
                    <span class="text">Admin</span>
                </label>
            </div>
            <button class="login-button" onclick="logoutUser()">Logout</button>
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
                        $stmt->bind_param("i", $userid);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $user = $result->fetch_assoc();
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
                    <h2>My Goals</h2>
                    <div class="meineZiele-container">
                        <form id="meineZieleForm">
                            <h3>1. Explain your problem</h3>
                            <label for="problem">Problem:</label>
                            <textarea id="problem" name="problem" placeholder="Explain your problem here..." required></textarea>

                            <h3>2. Explain your goal</h3>
                            <label for="goal">Ziel:</label>
                            <textarea id="goal" name="goal" placeholder="Explain your goal here..." required></textarea>

                            <h3>3. How would you like to reach you goal</h3>
                            <label for="way1">First way:</label>
                            <textarea id="way1" name="way1" placeholder="Describe the first way to achieve your goal here..." required></textarea>

                            <label for="way2">Second way:</label>
                            <textarea id="way2" name="way2" placeholder="Describe the second way to achieve your goal here..." required></textarea>
                            
                            <label for="way3">Third way:</label>
                            <textarea id="way3" name="way2" placeholder="Describe the third way to achieve your goal here..." required></textarea>
                            
                            <button type="button" onclick="saveZiele()">Save</button>
                        </form>

                        <h3>Your goals</h3>
                        <div id="zieleList">
                            <!-- User's goals will be displayed here -->
                        </div>
                    </div>
                </div>
                <div class="panel-container" id="forumPanel" style="display: none;">
                    <h2>Forum</h2>
                    <div class="forum-chat-wrapper">
                        <div class="forum-chat-container">
                            <div id="forum-chat-box">
                                <!-- Example of a user message -->
                                <div class="forum-message user">
                                    <img class="avatar" src="../images/icons/profilelogo.png" alt="User Avatar">
                                    <div class="text">This is a user message.</div>
                                </div>

                                <!-- Example of another user's message -->
                                <div class="forum-message ai">
                                    <img class="avatar" src="../images/icons/logo.ico" alt="AI Avatar">
                                    <div class="text">This is another user's message.</div>
                                </div>
                            </div>
                            <div class="forum-input-container">
                                <input id="forum-message-input" type="text" placeholder="Type a message...">
                                <button id="forum-send-btn" onclick="forumMessages()">Post</button>
                                <button id="forum-refresh-btn" onclick="renderForumMessages()">refresh</button>  <!-- Ehemaliger Button zum Testen des Renderns-->
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
                                        <div class="user-card" id="user-<?= $row['id'] ?>-<?= $row['name'] ?>">
                                            <div class="user-info">
                                                <span><strong>Name:</strong> <?= htmlspecialchars($row['name']) ?></span>
                                                <span><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></span>
                                            </div>
                                            <div class="action-buttons">
                                                <button class="action-btn" onclick="showForm(<?= htmlspecialchars(json_encode($row)) ?>)">Edit</button>
                                                <button class="action-btn delete-btn" onclick="deleteUser('<?= $row['id']?>', '<?php $row['name'] ?>')">Delete</button>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                endif; ?>
                            </div>
                            <div id="edit-user-form" style="display: none;">
                                <h3>Edit User</h3>
                                <form id="editForm" method="POST" action="update_user.php">
                                    <input type="hidden" name="id" id="edit-user-id">
                                    <input type="text" name="name" id="edit-name"  placeholder="Name" autocomplete="on">
                                    <input type="email" name="email" id="edit-email" placeholder="E-Mail">
                                    <input type="number" name="age" id="edit-age" placeholder="Alter">  <!-- Min. 18 -->
                                    <br>
                                    <!--<select id="status" name="status" data-original-value="0" oninput="setCustomValidity('')">
                                        <option value="0" selected ="selected">Benutzer</option>
                                        <option value="1">Administrator</option>
                                    </select>-->
                                    <div class="check-status">
                                        <input type="hidden" name="status" value="0" data-original-value="0">
                                        <input type="checkbox" name="status" value="1" id="check-status" data-original-value="0">
                                        <br>
                                        <label for="check-status">Administrator</label>
                                    </div>
                                    <br>
                                    <div class="button-container">
                                        <button type="submit">Submit</button>
                                        <button type="button" onclick="cancelEdit()">Cancel</button>
                                    </div>
                                </form>
                                <script>
                                    document.getElementById('editForm').addEventListener('submit', function(e) {
                                        e.preventDefault();

                                        const isAdminSelect = document.getElementById('check-status');
                                        const originalValue = isAdminSelect.getAttribute('data-original-value');
                                        const newValue = isAdminSelect.checked ? "1" : "0";


                                        Swal.fire({
                                            allowOutsideClick: false,
                                            allowEscapeKey: false,
                                            title: 'Sind Sie sich sicher, das zu ändern?',
                                            text: "Die Änderungen lassen sich nicht rückgängig machen.",
                                            icon: 'question',
                                            theme: 'dark',
                                            confirmButtonColor: '#FF0000',
                                            cancelButtonColor: '#3549C7',
                                            showCancelButton: true,
                                            confirmButtonText: 'Ja, ändern!',
                                            cancelButtonText: 'Abbrechen'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                if (originalValue !== newValue) {

                                                    const statusAlt = originalValue === "1" ? "Admin" : "Benutzer";
                                                    const statusNeu = newValue === "1" ? "Admin" : "Benutzer";

                                                    Swal.fire({
                                                        allowOutsideClick: false,
                                                        allowEscapeKey: false,
                                                        title: 'Sicherheitshinweis!',
                                                        text: `Der Status wird von "${statusAlt}" zu "${statusNeu}" geändert. Möchten Sie wirklich fortfahren?`,
                                                        icon: 'warning',
                                                        theme: 'dark',
                                                        confirmButtonColor: '#FF0000',
                                                        cancelButtonColor: '#3549C7',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Ja, fortfahren!',
                                                        cancelButtonText: 'Abbrechen'
                                                    }).then((secondResult) => {
                                                        if (secondResult.isConfirmed) {
                                                            e.target.submit();
                                                        }
                                                    });
                                                } else {
                                                    e.target.submit();
                                                }
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        <?php else: ?>
                           <p>You do not have permission to access the admin panel.</p>
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
                <p>&copy; 2025 Egoinfinitura All rights reserved.</p>
                <ul>
                    <li><a href="../public/Impressum.html">Impressum</a></li>
                    <li><a href="../public/PrivacyPolicy.html">Privacy Policy</a></li>
                    <li><a href="../public/TermsandConditions.html">Terms of Service</a></li>
                </ul>
            </section>
        </footer>
        <?php
            if (!empty($_SESSION['error'])) {
                echo "<script>
                    Swal.fire({
                        title: 'Error!',
                        text: '" . addslashes($_SESSION['error']) . "',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        background: '#333',
                        color: 'white',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        toast: true,
                        position: 'top-end',
                    });
                </script>";
                unset($_SESSION['error']);
            } elseif (!empty($_SESSION['success'])) {
                echo "<script>
                    Swal.fire({
                        title: 'Success!',
                        text: '" . addslashes($_SESSION['success']) . "',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        background: '#333',
                        color: 'white',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                        toast: true,
                        position: 'top-end',
                    });
                </script>";
                unset($_SESSION['success']);
            }
        ?>
        <script>
            function logoutUser() {
                window.location.href = '/Project-8-Ethik/authsystem/logout.php';
            }

            function togglePopupMenu() {
                var popupMenu = document.getElementById("popup-menu");
                popupMenu.style.display = popupMenu.style.display === "none" ? "block" : "none";
                popupMenu.classList.toggle("show");
                //Swal.fire({
                    //title: 'Info',
                    //text: 'Das Menü ist aktuell deaktiviert.',
                    //icon: 'warning',
                    //background: '#333',
                    //color: 'white',
                    //toast: true,
                    //position: 'top-end',
                    //showConfirmButton: false,
                    //timer: 1500,
                    //timerProgressBar: true
                //});
            }

            <?php
                $allowedPanels = ['profilePanel', 'meineZielePanel', 'forumPanel', 'aiGuidancePanel'];

                if ($user['status'] == 1) {
                    $allowedPanels[] = 'adminPanel';
                }
            ?>

            const allowedPanels = <?= json_encode($allowedPanels) ?>;

            function switchPanel(panelId) {
                const panels = document.querySelectorAll('.panel-container');
                panels.forEach(panel => panel.style.display = 'none');

                if (allowedPanels.includes(panelId)) {
                    document.getElementById(panelId).style.display = 'block';
                    sessionStorage.setItem('panelId', panelId);
                } else {
                    Swal.fire({
                        title: 'Access Denied',
                        text: 'You do not have permission to access this panel.',
                        icon: 'error',
                        background: '#333',
                        color: 'white',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#FF0000',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then (result => {
                        if (result.isConfirmed) {
                            switchPanel('profilePanel');
                        }
                    });
                    sessionStorage.setItem('panelId', 'profilePanel');
                }
            }

            const savedPanel = sessionStorage.getItem('panelId');
            if (savedPanel) {
                switchPanel(savedPanel);
            } else {
                switchPanel('profilePanel');
            }

            const messages = [
                { avatar: "../images/icons/logo.ico", name: "AI", text: "Hello! How can I assist you today?", type: "ai" },
            ];
            
            function forumMessages(){
               const text = document.getElementById("forum-message-input").value;
               console.log(text);
               fetch('forum_messages.php', {
                    method: 'POST',
                    body: JSON.stringify({ messagetext: text }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                    
                }).then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            title: 'Sent successfully',
                            text: '',
                            icon: 'success',
                            background: '#333',
                            color: 'white',
                            position: 'top-end',
                            toast: true,
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                        }).then(() => {
                            window.location.href = 'profile.php';
                        });
                    } else {
                        console.log(data);
                        Swal.fire({
                            title: 'Error',
                            text: 'Error sending message.',
                            icon: 'error',
                            background: '#333',
                            color: 'white',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error',
                        text: 'There was a problem with the request.',
                        icon: 'error',
                        background: '#333',
                        color: 'white',
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                    });
                });
            }

            function admin() {
                const nutzerId = event.target.getAttribute('nutzer');
                const messageid = event.target.getAttribute('messageid');
                const entrytime = event.target.getAttribute('msgtime');
                const userStatus = <?= $_SESSION['status'] ?>;

                fetch('get_user_info.php?id=' + nutzerId)
                    .then(response => response.json())
                    .then(nutzerdaten => {
                        if(userStatus == 1){
                        Swal.fire({
                            title: 'Admin Panel',
                            html: 'Nachricht vom '  + (nutzerdaten.status == 1 ? ' Administrator' : ' Nutzer ') + ': <b>' + nutzerdaten.name + '</b><br>zuletzt aktualisiert am: <i> ' + entrytime + '</i>',
                            icon: 'info',
                            background: '#333',
                            color: 'white',
                            confirmButtonColor: '#FF0000',
                            cancelButtonColor: '#00FF00',
                            confirmButtonText: 'Nachricht löschen',
                            showCancelButton: true,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch('delete_message.php', {
                                    method: 'POST',
                                    body: JSON.stringify({ messageid: messageid }),
                                    headers: {
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.status === 'success') {
                                        Swal.fire({
                                            title: 'Erfolg',
                                            text: 'Die Nachricht wurde erfolgreich gelöscht.',
                                            icon: 'success',
                                            background: '#333',
                                            color: 'white',
                                            position: 'top-end',
                                            toast: true,
                                            showConfirmButton: false,
                                            timer: 2000,
                                            timerProgressBar: true,
                                        }).then(() => {
                                            window.location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Fehler',
                                            text: error.message,    
                                            icon: 'error',
                                            background: '#333',
                                            color: 'white',
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 2000,
                                            timerProgressBar: true,
                                        });
                                    }
                                })
                                .catch(() => {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'There was a problem with the request.',
                                        icon: 'error',
                                        background: '#333',
                                        color: 'white',
                                        position: 'top-end',
                                        toast: true,
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: true,
                                    });
                                });
                            }
                        });
                        
                    }else{
                        Swal.fire({
                            title: 'Access Denied',
                            text: 'You do not have permission to access this information.',
                            icon: 'error',
                            background: '#333',
                            color: 'white',
                            position: 'top-end',
                            toast: true,
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                        });
                    }
                    });
            }

            function renderForumMessages() {
                const chatBox = document.getElementById("forum-chat-box");
                chatBox.innerHTML = "";

                const forumMessagesRENDER = <?php
                    $query = "SELECT * FROM forum WHERE showentry = 1 && deleteentry = 0 ORDER BY id ASC";
                    $result = $db->query($query);
                    $daten = array();
                    while ($rowa = $result->fetch_assoc()) {
                        $daten[] = array(
                            'id' => $rowa['id'],
                            'idnutzer' => $rowa['idnutzer'],
                            'messagetext' => $rowa['messagetext'],
                            'type' => ($rowa['idnutzer'] == $_SESSION['userid']) ? 'user' : 'ai',
                            'text' => $rowa['messagetext'],
                            'time' => $rowa['entrytime'],
                            'avatar' => ($rowa['idnutzer'] == $_SESSION['userid']) ? '../images/icons/profilelogo.png' : '../images/icons/logo.ico'
                        );
                    }
                    echo json_encode($daten);
                ?>;

                <?php if($_SESSION['userid'] === 0): ?>
                    forumMessagesRENDER.forEach(msg => {
                        const msgDiv = document.createElement("div");
                        msgDiv.className = `message ${msg.type}`;
                        msgDiv.innerHTML = `
                            ${msg.type !== "user" ? `<div class="forum-message ai"><img src="${msg.avatar}" class="avatar">` : ""}
                            ${msg.type === "user" ? `<div class="forum-message user">` : ""}
                            <div class="text">${msg.text}
                            ${msg.type === "user" ? `<img src="${msg.avatar}" class="avatar">` : ""}
                            </div>
                        `;
                        chatBox.appendChild(msgDiv);
                    });
                <?php else: ?>
                    forumMessagesRENDER.forEach(msg => {
                        const msgDiv = document.createElement("div");
                        msgDiv.className = `message ${msg.type}`;
                        msgDiv.innerHTML = `
                            ${msg.type !== "user" ? `<div class="forum-message ai" "><img src="${msg.avatar}" class="avatar">` : ""}
                            ${msg.type === "user" ? `<div class="forum-message user">` : ""}
                            ${msg.type === "user" ? `<img src="${msg.avatar}" class="avatar">` : ""}
                            <div class="text" nutzer="${msg.idnutzer}" messageid="${msg.id}" msgtime="${msg.time}" onclick="admin()">${msg.text}
                            </div>
                        `;
                        chatBox.appendChild(msgDiv);
                    });
                <?php endif; ?>
                chatBox.scrollTop = chatBox.scrollHeight;
            }

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
                    messages.push({ avatar: "../images/icons/profilelogo.png", name: "You", text: input.value, type: "user" });
                    // AI response
                    messages.push({ avatar: "../images/icons/logo.ico", name: "AI", text: "This feature is not yet supported!", type: "ai" });
                    messages.push({ avatar: "../images/icons/logo2.png", name: "AI", text: "The AI is still being trained!", type: "ai" });
                    messages.push({ avatar: "../images/icons/logo2.png", name: "AI", text: "Our Team is working day and night to perfect its responses!", type: "ai" });

                    input.value = "";
                    renderMessages();
                }
            });

            document.getElementById("message-input").addEventListener("keypress", (event) => {
                if (event.key === "Enter") {
                    document.getElementById("send-btn").click();
                }
            });

            function showForm(user) {

                document.getElementById('edit-user-id').value = user.id;
                document.getElementById('edit-name').value = user.name;
                document.getElementById('edit-email').value = user.email;
                document.getElementById('edit-age').value = user.age;

                const statusCheckbox = document.getElementById('check-status');
                if (statusCheckbox) {
                    const isAdmin = parseInt(user.status) === 1;
                    statusCheckbox.checked = isAdmin;
                    statusCheckbox.setAttribute('data-original-value', isAdmin ? '1' : '0');
                } else {
                    console.error('Checkbox with ID "status-checkbox" not found.');
                }

                document.getElementById('user-list').style.display = 'none';
                document.getElementById('edit-user-form').style.display = 'block';
            }

            function cancelEdit() {
                document.getElementById('edit-user-form').style.display = 'none';
                document.getElementById('user-list').style.display = 'block';
            }

            function deleteUser(userId, username) {
                console.log(userId, username);
                Swal.fire({
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    theme: 'dark',
                    title: 'Nutzer löschen?',
                    text: 'Benutzer ' + username + ' wird gelöscht',
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton: true,
                    color: 'white',
                    confirmButtonColor: '#FF0000',
                    cancelButtonColor: '#00FF00',
                    confirmButtonText: 'Ja, Löschen!',
                    cancelButtonText:  'Nein'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('delete_user.php', {
                            method: 'POST',
                            body: JSON.stringify({ userId: userId }),
                            headers: {
                                'Content-Type': 'application/json'
                            }
                            
                        }).then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire({
                                    title: 'Erfolg',
                                    text: 'Der Nutzer wurde erfolgreich gelöscht.',
                                    icon: 'success',
                                    background: '#333',
                                    color: 'white',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    window.location.href = 'profile.php';
                                });
                            } else {
                                Swal.fire({
                                    title: 'Fehler',
                                    text: 'Fehler beim Löschen des Nutzers.',
                                    icon: 'error',
                                    background: '#333',
                                    color: 'white',
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Fehler',
                                text: 'Es gab ein Problem mit der Anfrage.',
                                icon: 'error',
                                background: '#333',
                                color: 'white',
                                confirmButtonText: 'OK'
                            });
                        });
                    }
                });
            }

            function saveZiele() {
                const problem = document.getElementById("problem").value.trim();
                const goal = document.getElementById("goal").value.trim();
                const way1 = document.getElementById("way1").value.trim();
                const way2 = document.getElementById("way2").value.trim();
                const way3 = document.getElementById("way3").value.trim();

                document.querySelectorAll(".meineZieleForm").forEach(input => input.value = "");


                const zieleData = {
                    problem: problem,
                    goal: goal,
                    way1: way1,
                    way2: way2,
                    way3: way3
                };

                fetch('goals.php', {
                    method: 'POST',
                    body: JSON.stringify(zieleData),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            title: 'Success',
                            text: 'Goal was successfully saved.',
                            icon: 'success',
                            background: '#333',
                            color: 'white',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                        }).then(() => {
                            window.location.href = 'profile.php';
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: data.message,
                            icon: 'error',
                            background: '#333',
                            color: 'white',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error',
                        text: 'There was a problem with the request.',
                        icon: 'error',
                        background: '#333',
                        color: 'white',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                    });
                });
            }
            const zieleDATA = <?php
                    $idnutzer = $_SESSION['userid'];
                    $query = "SELECT * from goals WHERE idnutzer = ?";
                    $stmt = $db->prepare($query);
                    $stmt->bind_param("i", $idnutzer);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $datengoals = [];
                    while ($row = $result->fetch_assoc()) {
                        $datengoals[] = array(
                            'id' => $row['id'],
                            'problem' => $row['problem'],
                            'goal' => $row['goal'],
                            'way1' => $row['way1'],
                            'way2' => $row['way2'],
                            'way3' => $row['way3']
                        );
                    }
                    
    
                    echo json_encode($datengoals);
                ?>
            
            function showZiele(){
                const zieleDATA = <?php echo json_encode($datengoals); ?>;
                const zieleList = document.getElementById("zieleList");
                zieleList.innerHTML = "";
                zieleDATA.forEach(entry => {
                    const zieleEntry = document.createElement("div");
                    zieleEntry.className = "ziele-entry";
                    zieleEntry.innerHTML = `
                        <p><strong>Problem:</strong> ${entry.problem}</p>
                        <p><strong>Goal:</strong> ${entry.goal}</p>
                        <p><strong>Way 1:</strong> ${entry.way1}</p>
                        <p><strong>Way 2:</strong> ${entry.way2}</p>
                        <p><strong>Way 3:</strong> ${entry.way3}</p>
                        <button onclick="deleteZiele(${entry.id})">Delete</button>
                    `;
                    zieleList.appendChild(zieleEntry);
                });
            }

            function deleteZiele(id) {  
                Swal.fire({
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    theme: 'dark',
                    title: 'Delete Goal?',
                    text: 'Are you sure that you would like to delete this goal?',
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton: true,
                    color: 'white',
                    confirmButtonColor: '#FF0000',
                    cancelButtonColor: '#00FF00',
                    confirmButtonText: 'Yes, delete!',
                    cancelButtonText:  'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('delete_goals.php', {
                                    method: 'POST',
                                    body: JSON.stringify({ goalid: id }),
                                    headers: {
                                        'Content-Type': 'application/json'
                                    }
                                    
                                }).then(response => response.json())
                                .then(data => {
                                    if (data.status === 'success') {
                                        Swal.fire({
                                            title: 'Success',
                                            text: 'The Goal was successfully deleted.',
                                            icon: 'success',
                                            background: '#333',
                                            color: 'white',
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 2000,
                                            timerProgressBar: true,
                                        }).then(() => {
                                            window.location.href = 'profile.php';
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Fehler',
                                            text: data.message,
                                            icon: 'error',
                                            background: '#333',
                                            color: 'white',
                                            confirmButtonText: 'OK'
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'There was a problem with the request.',
                                        icon: 'error',
                                        background: '#333',
                                        color: 'white',
                                        confirmButtonText: 'OK'
                                    });
                                });
                            };
                });
            }

            renderForumMessages();
            showZiele();
           

            document.querySelectorAll('textarea').forEach(textarea => {
                textarea.addEventListener('input', function () {
                    this.style.height = 'auto'; // Setze die Höhe zurück
                    this.style.height = this.scrollHeight + 'px'; // Passe die Höhe an den Inhalt an
                });
            });

            const chatBox = document.getElementById("chat-box");

            messages.forEach((message) => {
                const messageElement = document.createElement("div");
                messageElement.className = `message ${message.type}`;
                messageElement.innerHTML = `
                    <img src="${message.avatar}" alt="${message.name}" class="avatar">
                    <div class="text">${message.text}</div>
                `;
                chatBox.appendChild(messageElement);
            });
        </script>
        
    </body>
</html>