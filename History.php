<?php
session_start();
?>


<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Greenspace Showcase</title>  
    <link rel="stylesheet" href="History.css">  
</head>  
<body>  
    <header>  
       
        <nav class="nav"> 
           
                <ul class="sideBar">
                    <li><a  href="#" onclick="hideMenu()"><img src="icon.menu/close.png" alt="me" height="0" width="0"></a></li>
                    <li><img src="Logo1.png "style="width: 200px; height=200px" alt="Maca Image"></li>
                    <li><a  href="index.php">Home</a></li>
                    <li><a  href="Stages.php">Stages</a></li>
                    <li><a  href="Sets.php">Sets</a></li>
                    <li><a  href="Support.php">Support</a></li>
                    <li><a  href="Cars.php">TPS Picture Cars</a></li>
                    <li><a  href="Contact.php">Contact</a></li>
                    <li><a  href="News.php">News</a></li>
                    <li><a  href="Entertaiment.php">Entertaiment</a></li>
                    <li><a  href="Outreach.php">Outreach</a></li>
                </ul>
            
         
            <ul class="nav-link">
                <li class="nav-item">  
                    <a href="Stages.php" class="stages">Stages</a>  
                    <span href="Stages.php" class="hover-text">Stages</span>  
                </li>  
                <li class="nav-item">
                    <a href="Sets.php" class="stages">Sets</a>
                    <span href="Sets.php" class="hover-text">Sets</span> 
                </li>  
                <li class="nav-item">
                    <a href="Historic_District.php" class="stages">Historic District</a>
                    <span href="Historic_District.php" class="hover-text">Historic District</span> 
                </li>  
                <li class="nav-item">
                    <a href="Greenspace.php" class="stages">Greenspace</a>
                    <span href="Stages.php" class="hover-text">Greenspace</span> 
                </li>  
                <li class="nav-item">
                    <a href="History.php" class="stages">History</a>
                    <span href="Stages.php" class="hover-text">History</span> 
                </li>  
                <li class="nav-item">
                    <a href="Contact.php" class="stages">Contact</a>
                    <span href="Stages.php" class="hover-text">Contact</span> 
                </li>  
            </ul>  
            <div class="nav-item" >
                <a href="#" class="menu-icon" id="menuToggle" onclick="toggleMenu()">
                    <img id="menuIcon" src="icon.menu/menu.png" alt="me" height="30" width="30">
                    <img id="menuHoverIcon" src="icon.menu/open_hover.png" alt="mee" height="30" width="30" class="hover-icon">
                </a>
            </div>  
            
        </nav>  
        
    </header> 

    <div class="container">  
        <div class="greenspace-section"  >  
            <h2>History </h2>  
            <p>Fort McPherson was an active Army Base from 1885 until 2011. At the time of its closure, the base was one of the largest command centers in the U.S. military. The installation was home to the U.S. Army Forces Command (FORSCOM), which is responsible for the command and control, unit training, and operational readiness of the active army. The base also served as headquarters for the U.S. Army Reserve Command, the U.S. Army Central, and the U.S. Army Installation Command for the Southeast region.</p>  
        </div>  
        
        <div class="slider">  
            <div class="slides">  
                <img class="slide" src="history_img/1-history.jpg" alt="Imag 1">  
                <img class="slide" src="history_img/2-history.jpg" alt="Imag 2">  
                <img class="slide" src="history_img/3-history.jpg" alt="Imag 3">  
                <img class="slide" src="history_img/4-history.jpg" alt="Imag 4">  
            </div>  
            <div class="navigation">  
                <button class="prev" onclick="changeSlide(-1)">&#10094;</button>  
                <button class="next" onclick="changeSlide(1)">&#10095;</button>  
            </div>  
        </div>  
    </div>  

    <footer>  
        <h4><strong>Sign up for our newsletter</strong></h4>  
        <hr>    
        <input type="email"  id="signupEmail" placeholder="Your Email Address" required>  
        <button type="submit"onclick="redirectToRegister()"><strong>Sign Up!</strong></button>  
        <hr>  
    </footer>  

    <script src="History.js"></script>  
</body>  
</html>