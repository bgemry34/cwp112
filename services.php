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

    <section class="skills about">
        <div class="container">
            <br>
                <div class="header">
                        <h3>Services</h3>
                        <hr>
                </div>
            <br>
            <div class="grid-4">
                <div>
                    <img src="images/hotstone.jpg" alt="">
                    <p>Hot stone massage</p>
                </div>

                <div>
                    <img src="images/thaimassage.jpg" alt="">
                    <p>Thai Massage</p>
                </div>

                <div>
                    <img src="images/ashiatsu.jpg" alt="">
                    <p>Ashiatsu Massage</p>
                </div>

                <div>
                    <img src="images/swedishmassage.jpg" alt="">
                    <p>Swedish Massage</p>
                </div>

                <div>
                    <img src="images/deeptissue.jpg" alt="">
                    <p>Deep Tissue Massage</p>
                </div>

                <div>
                    <img src="images/sports.jpg" alt="">
                    <p>Sports Massage</p>
                </div>

                <div>
                    <img src="images/shiatsu.jpg" alt="">
                    <p>Shiatsu Massage</p>
                </div>

                <div>
                    <img src="images/triggerpoint.jpg" alt="">
                    <p>Trigger Point Massage</p>
                </div>

                <div>
                    <img src="images/couple.jpg" alt="">
                    <p>Couples massage</p>
                </div>

                <div>
                    <img src="images/prenatal.jpg" alt="">
                    <p>Prenatal Massage</p>
                </div>

                <div>
                    <img src="images/reflexology.jpg" alt="">
                    <p>Reflexology</p>
                </div>

                <div>
                    <img src="images/foot.jpg" alt="">
                    <p>Foot massage</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
		<div class="container">
			<p>Copyright &copy; 2020 - Spa n Chill</p>
		</div>
	</footer>
</body>
</html>