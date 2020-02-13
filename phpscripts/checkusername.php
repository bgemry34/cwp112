<?php
function checkUsername($username){
    $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0){
        return true;
    }
    else{
        return false;
    }
}

$post = json_decode(file_get_contents('php://input'), true);
if(isset($post['username'])){
    $istaken = checkUsername($post['username']) ? false : true;
    echo json_encode(['isTaken'=> $istaken], JSON_PRETTY_PRINT);
}
