<?php
require_once('UserDAO.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$userDAO = new UserDAO($conn);
$username = $_POST['username'];
$password = $_POST['password'];

if ($userDAO->checkLogin($username, $password)) {
    header('Location: dashboard_root.html');
    exit();
} else {
    header('Location: index.html');
    exit();
}
$conn->close();
