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

    <div 
    class=""
    style="width:50%; margin:auto; border: 2px solid black;">
    <div class="container">
    <div style="display:grid; grid-template-columns: 1fr 1fr">
    <div class="">
    <h1 style=" float:left;">Posts</h1>
    </div>
    <div class="">
    <a id="modal-btn" 
    style="float:right; background-color:#27ae60; padding:10px; color: #f4f4f4; margin-top: 25px;" href="#">Add Post</a>
    </div>
    </div>
        <div class="group-3">
            <?php
            $user_id = $_SESSION['userId'];
            $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
            $stmt = $mysqli->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY id DESC");
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
              ?>
              <div class="">
                <h3>Title</h3>
            </div>
            <div class="">
                <h3>Edit</h3>
            </div>
            <div class="">
                <h3>Delete</h3>
            </div> 
            <?php
                while($row = $result->fetch_assoc()) {
                // $_SESSION['user'] = $row['username'];
                // $_SESSION['userId'] = $row['id'];
                ?>
                <div class="">
                <h3 style="width: 80%;
                 word-wrap: break-word;"><a style="text-decoration:none; color:black;" href="./../../forum/post.php?id=<?=$row['id']?>"><?=$row['title']?></a></h3>
                </div>
                <div class="">
                    <button class="btnEdit"><a href="./editPost.php?id=<?=$row['id']?>">Edit</a></button>
                </div>
                <div class="">
                <button class="btnDelete"><a href="./deletePost.php?id=<?=$row['id']?>">Delete</a></button>
                </div> 
                <?php
                }
            }
            else{
                echo "<h1>NO POST<h1>";
          }
          ?>
                        
        </div>
    </div>
    
    </div>


    <!-- modal -->
    <div id="my-modal" class="modal">
    <div class="modal-content-post">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Add Post</h2>
      </div>
      <form id="create_post" action="profile.php" method="POST" enctype="multipart/form-data"> 
      <div class="modal-body">
        
        <div class="container-fluid">
        <div style="color:#f4f4f4   " id="validation_error">
        </div>
          <div style="display:grid; grid-template-columns: 1fr; color:#f4f4f4;">
          <label class="" for="">Title:</label>
          <input style="margin:5px;" type="text" id="Created_title" name="title" placeholder="Enter Title...">
          <label for="">Content:</label>
          <textarea style="margin:5px;" name="content" id="Created_content" cols="30" rows="10" placeholder="Enter Content..."></textarea>
          <label for="">Image:</label>
          <input style="margin:5px;" type="file" name="userfile" id="">
          <input type="hidden" name="createPost" value="tocreate">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button onclick="this.disabled = true" type="submit" class="btn-register">Submit</button>
      </div>
      </form>
    </div>
  </div>

<script src="./../../js/script.js"></script>

    
</body>
</html>
<?php
if(isset($_POST['createPost'])){
  $title = $_POST['title'];
  $content = addslashes($_POST['content']);
  $newcontent = str_replace("'", "\'", $content);
  $user_id = $_SESSION['userId'];

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
              $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
              $stmt = $mysqli->prepare("INSERT INTO posts(user_id, title, content, image) Values(?, ?, ?, ?)");
              $stmt->bind_param("ssss", $user_id, $title, $content, $fileNameNew);
              $stmt->execute();
              if ($stmt->execute()) {
                  $stmt->close();
                  echo "<script>alert('Added Successfully');window.location.replace('profile.php')</script>";
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
    $display = "INSERT INTO posts(user_id, title, content, image) Values('$user_id', '$title','$content','noimage.jpg')";
    if (mysqli_query($conn, $display)) {
        echo "<script>alert('Added Successfully');window.location.replace('profile.php')</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
  }
}