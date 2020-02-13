<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./../../images/favicon.ico">
    <link rel="stylesheet" href="./../../style.css">
    <title>Spa n Chill</title>
</head>
<body>
    <nav>
        <div class="container-fluid">
        <div class="nav-logo">
        <a href="./../../"><img style="height:64px; display:block; float:left" src="./../../images/navbrand.png" alt=""></a>
        </div>
        <ul class="nav-left">
                <li><a href="./../../">Home</a></li>
                <li><a href="./../../services.php">Services</a></li>
                <li><a href="./../../contact.php">Contact</a></li>
                <li><a href="./../../forum">Forum</a></li>
                <?php if(isset($_SESSION['user'])):?>
                <li><a href="#"><?=$_SESSION['user']?></a></li>
                <li><form action="./logout.php"><input 
                style="margin:0; padding:0; background-color: transparent; font-size: 1em; font-family: Poppins" type="submit" value="Log-out" name="logout"></form></li>
                <?php else: ?>
                    <li><a href="./../auth/users/login.php">Login</a></li>
                <?php endif; ?>
            
        </ul>
        </div>
    </nav>      <br><br><br>

    <div class="container">
        <h1>Edit Post</h1>
        <form action="editPost.php" method="post" enctype="multipart/form-data">
        <?php
            if(isset($_GET['id']))
            $id = $_GET['id'];
            $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
            $stmt = $mysqli->prepare("SELECT * FROM posts WHERE id = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <div class="" style="display:grid; grid-template-columns: 1fr">
            <label for="">Title:</label>
            <input type="text" name="title" value="<?=$row['title']?>" id="">
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <label for="">Content:</label>
            <textarea name="content" id="" cols="30" rows="10"><?=$row['content']?></textarea>
            <input type="file" name="userfile" id="">
            <input type="submit" name="editPost" value="Submit">
            </div>
            <?php endwhile;?>
        </form>
    </div>

<script src="./../../js/script.js"></script>

    
</body>
</html>
<?php
if(isset($_POST['editPost'])){
    $title = $_POST['title'];
    $content = addslashes($_POST['content']);
    $id = $_POST['id'];
  
    if(file_exists($_FILES['userfile']['tmp_name']) || is_uploaded_file($_FILES['userfile']['tmp_name'])){
      $file = $_FILES['userfile'];
    // if(isset($_FILES["userfile"]['name'][0])){
      $fileName =  $_FILES['userfile']['name'];
      $fileTmpName  = $_FILES['userfile']['tmp_name'];
      $fileSize = $_FILES['userfile']['size'];
      $fileError = $_FILES['userfile']['error'];
      $fileType = $_FILES['userfile']['type'];
  
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));
  
      $allowed = array('jpg', 'jpeg', 'png');
  
      if(in_array($fileActualExt, $allowed)){
          if($fileError===0){
              if($fileSize<2*1048576){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = './../../images/post_images/'.$fileNameNew;
                $conn=mysqli_connect("localhost","root","","spanchill");
                $display = "UPDATE posts SET title='$title', content='$content', image='$fileNameNew' where id = '$id'";
                if (mysqli_query($conn, $display)) {
                    echo "<script>alert('Edited Successfully');window.location.replace('profile.php')</script>";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
                move_uploaded_file($fileTmpName, $fileDestination);
              }else{
                echo "<script>alert('file size is too big')</script>";
              }
          }else{
            echo "<script>alert('there was an error uploading your file')</script>";
          }
      }else{
        echo "<script>alert('error file type')</script>";
      }
    }else{
      $conn=mysqli_connect("localhost","root","","spanchill");
      $display = "UPDATE posts SET title='$title', content='$content' where id = '$id'";
      if (mysqli_query($conn, $display)) {
          echo "<script>alert('Edited Successfully');window.location.replace('profile.php')</script>";
      } else {
          echo "Error updating record: " . mysqli_error($conn);
      }
    }
  }