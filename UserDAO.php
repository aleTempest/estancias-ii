<?php

class UserDAO {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function checkLogin($username, $password) {
        $username = $this->conn->real_escape_string($username);
        $password = $this->conn->real_escape_string($password);

        $sql = "SELECT * FROM USERS WHERE username='$username' AND password='$password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}