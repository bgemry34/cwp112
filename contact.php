

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./images/favicon.ico">
    <title>Spa n Chill</title>
</head>
<body>
    <nav>
        <div class="container-fluid">
        <div class="nav-logo">
            <a href="./"><img style="height:64px; display:block; float:left" src="./images/navbrand.png" alt=""></a>
        </div>
        <ul class="nav-left">
                <li><a href="./">Home</a></li>
                <li><a href="./services.php">Services</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <li><a href="./forum">Forum</a></li>
                <?php if(isset($_SESSION['user'])):?>
                <li><a href="./auth/users/profile.php"><?=$_SESSION['user']?></a></li>
                <li><form action="./auth/users/logout.php"><input 
                style="margin:0; padding:0; background-color: transparent; font-size: 1em; font-family: Poppins" type="submit" value="Log-out" name="logout"></form></li>
                <?php else: ?>
                <li><a href="./auth/users/login.php">Login</a></li>
                <?php endif; ?>
        </ul>
        </div>
    </nav>

    <img style="display:block; margin:auto;" src="./images/navbrand.png" alt="">

    <div class="header">
            <h3>Contact Us</h3>
            <hr>
    </div>

    <div class="container">
    <form action="">
        <div class="container">
            <div class="group-2">
            <label class="title"  for="">First Name</label>
            <input type="text" placeholder="Enter First Name ....">
            
            <label class="title" for="">Last Name</label>
            <input type="text" placeholder="Enter Last Name ....">
            
            <label class="title" for="">Screen Name</label>
            <input type="text" placeholder="Enter Screen Name ....">

            
            <label class="title" for="">Date of Birth</label>
            <input type="date">
            <label class="title" for="">Gender</label>
            <div class="inline" style=>
                    <input type="radio" name="gender" value="Male">
                    <label for="Fname">Male</label>
                    <input type="radio" name="gender" value="Female">
                    <label for="Fname">Female
                        </label>
            </div>

            <label class="title" for="">Message:</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
            

            <div></div>
            <br>
            </div>

        <div style="float:right; margin-bottom:50px;">
            <input type="submit" value="Submit">
            <input type="reset" value="Cancel">
        </div>
    </div>
    </form>
    </div>

    <footer>
		<div class="container">
			<p>Copyright &copy; 2020 - Spa n Chill</p>
		</div>
	</footer>
</body>
</html>