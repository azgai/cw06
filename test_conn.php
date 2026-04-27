<?php
$host = "localhost";
$user = "aguragai1";
$pass = "aguragai1";
$db   = "aguragai1";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
echo " | Server info: " . $conn->server_info;

$conn->close();
?>
