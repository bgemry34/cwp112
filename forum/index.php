<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./../images/favicon.ico">
    <link rel="stylesheet" href="./../style.css">
    <title>Spa n Chill</title>
</head>
<body>
    <nav>
        <div class="container-fluid">
        <div class="nav-logo">
        <a href="./"><img style="height:64px; display:block; float:left" src="./../images/navbrand.png" alt=""></a>
        </div>
        <ul class="nav-left">
                <li><a href="./../">Home</a></li>
                <li><a href="./../services.php">Services</a></li>
                <li><a href="./../contact.php">Contact</a></li>
                <li><a href="./">Forum</a></li>
                <?php if(isset($_SESSION['user'])):?>
                <li><a href="./../auth/users/profile.php"><?=$_SESSION['user']?></a></li>
                <li><form action="./../auth/users/logout.php"><input 
                style="margin:0; padding:0; background-color: transparent; font-size: 1em; font-family: Poppins" type="submit" value="Log-out" name="logout"></form></li>
                <?php else: ?>
                    <li><a href="./../auth/users/login.php">Login</a></li>
                <?php endif; ?>
            
        </ul>
        </div>
    </nav>

    <div class="header">
            <h3 style="text-align:left; margin-left:50px; border-bottom: 4px solid black;">Forum</h3>
    </div>

    <div class="postContainer">
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
            $stmt = $mysqli->prepare("SELECT image, posts.id, posts.created_at, title, username  FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC");
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
            ?>
            <?php
                while($row = $result->fetch_assoc()) {
                // $_SESSION['user'] = $row['username'];
                // $_SESSION['userId'] = $row['id'];
                ?>
                <div class="posts">
                <div class="container-fluid">
                    <div class="picAndPost">
                        <div>
                            <img 
                            style="width:250px; height: 115px; margin-top:5px;" 
                            src="./../images/post_images/<?=$row['image']?>"
                            alt="">
                        </div>
                        <div>
                            <h1 style="margin:0; padding:0; " ><a style="text-decoration:none; color:black" href="./post.php?id=<?=$row['id']?>"><?=$row['title']?></a></h1>
                            <p style="margin:0; padding:0;">Created date: <?=$row['created_at']?> <small>by <?=$row['username']?></small></p>
                        </div>
                    </div>
                </div>
                </div>
                <?php
                }
            }
            else{
                echo "<h1>NO POST<h1>";
          }
          ?>
          <!-- //end -->
    </div>
</body>
</html>