<?php
session_start();
function checkUsername($username){
    $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0){
        return false;
    }
    else{
        return true;
    }
}

// returns true if username not is already taken else false


if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    if(checkUsername($username)){
        echo "<script>alert('username has already taken')</script>";
        header('Location: http://localhost:8080/cwp112Project/auth/users/login.php');
    }else{
    $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
    $stmt = $mysqli->prepare("INSERT INTO users (username, password, firstName, lastName) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $firstName, $lastName);
    $stmt->execute();
    $stmt->close();
    }

    header('Location: http://localhost:8080/cwp112Project/auth/users/login.php');
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0){
        return true;
    }
    else{
        return false;
    }
    
}