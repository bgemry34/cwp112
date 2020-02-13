<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
    $stmt = $mysqli->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    echo "<script>alert('Deleted Successfully');window.location.replace('profile.php')</script>";
  }
