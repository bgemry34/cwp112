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
    <style>
        input::placeholder{
            padding:0;
            color:#f4f4f4;
        }
        input{
            font-size:20px;
        }
        input:focus{
            outline:none;
        }

        input[type=password]{
            padding-left: 10px;
        }

        input[type=text], input[type=password]{
            width:100%; background-color: 
            transparent; border:none; border-radius: 0 ;
            border-bottom: 2px #f4f4f4 solid;
            caret-color:#f4f4f4;
            color:#f4f4f4;
            padding-bottom:15px;
        }
        a{
            text-decoration:none;
            color:#f4f4f4;
        }   

    </style>
    <title>Spa n Chill</title>
</head>
<body>
    <nav>
        <div class="container-fluid">
        <div class="nav-logo">
            <a href="./"><img style="height:64px; display:block; float:left" src="./../../images/navbrand.png" alt=""></a>
        </div>
        <ul class="nav-left">
                <li><a href="./../../">Home</a></li>
                <li><a href="./../../services.php">Services</a></li>
                <li><a href="./../../contact.php">Contact</a></li>
                <li><a href="./../../forum">Forum</a></li>
                <li><a href="./login.php">Login</a></li>
        </ul>
        </div>
    </nav>

    <div class="loginContainer">
        <div class="coantiner">
        <div class="formContainer">
            <div class="container">
                <h1 style="letter-spacing:3px; font-size: 3rem;">Login</h1>
                <form action="./login.php" method="post" >
                <input class="forms-input" style="" type="text" 
                name="username" id="" placeholder="Username...">
                <input style="width:100%; margin-top: 2-px;" type="password" name="password" id="" placeholder="Password..." >
                <input style="width:100%; background-color:#ecf0f1; color:#2c3e50;"
                 type="submit" name="login" value="Login">
                </form>
                <p><a id="modal-btn" href="#">Register</a></p>
            </div> 
        </div>
        </div>
    </div>

    <footer>
		<div class="container">
			<p>Copyright &copy; 2020 - Spa n Chill</p>
		</div>
	</footer>

    <!-- modal-->
    <div id="my-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Register</h2>
      </div>
      
      <form id="create_form" action="./../../phpscripts/AuthUser.php" method="POST"> 
      <div class="modal-body">
        <div style="color:#f4f4f4   " id="validation_error">
        </div>
        <div class="container-fluid">
        <input type="text" id="Created_username" name="username" placeholder="Username...">
        <input type="password" name="password" id="Created_password" placeholder="Password...">
        <input type="text" name="firstName" id="Created_firstName" placeholder="First Name...">
        <input style="margin-bottom:30px;" type="text" name="lastName" id="Created_lastName" placeholder="Last Name...">
        <input type="hidden" name="register" value="toRegister">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn-register">Register</button>
      </div>
      </form>
    </div>
  </div>

<script src="./../../js/script.js"></script>
</body>
</html>

<?php
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $mysqli = new mysqli('localhost', 'root', '', 'spanchill');
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        $_SESSION['user'] = $row['username'];
        $_SESSION['userId'] = $row['id'];
        }
        header('Location: http://localhost:8080/cwp112Project/');
    }
    else{
        echo "<script>alert('Incorrect Username or Password')</script>";
    }
    
}