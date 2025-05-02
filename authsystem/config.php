<?php
define('DBSERVER', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', 'testtest');
define('DBNAME', 'ethik_project');

$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

if($db === false){
    die("Error: connection error. " . mysqli_connect_error());
}
?>
