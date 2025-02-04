<?php

?>
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>V&R Studios</title>  
    <link rel="stylesheet" href="header.css">  
</head>  
<body> 
    <header>  
       
        <nav class="nav"> 
           
                <ul class="sideBar">
                    <li><a  href="#" onclick="hideMenu()"><img src="icon.menu/close.png" alt="me" height="0" width="0"></a></li>
                    <li><img src="Logo1.png" alt="Maca Image" style="width: 100px; height: 70px;"></li>
                    <li><a  href="index.php">Home</a></li>
                    <li><a  href="stages.php">Stages</a></li>
                    <li><a  href="Sets.php">Sets</a></li>
                    <li><a  href="cars/supp.php">Support</a></li>
                    <li><a  href="cars/cars.php">V&R Picture Cars</a></li>
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
                    <img id="menuIcon" src="icon.menu/open.png" alt="me" height="30" width="30">
                    <img id="menuHoverIcon" src="icon.menu/open_hover.png" alt="mee" height="30" width="30" class="hover-icon">
                </a>
            </div>  
            
        </nav>  
        
    </header> 
    <div class="overlay" id="overlay" onclick="hideMenu()"></div>
  
    <div class="bg-img" style="background-image: url('homepage_img/imazhi_1.jpg');">
        
        <h2>
            <img src="Logo1.png" alt="Logo" class="logo">
            Welcome to Valon & Rijad Studios
        </h2>
        <a href="video_arena/Valon&RijadStudios.mp4" target="_blank" id="videoLink">
            <h4><br><br> Explore the Possibilities</h4>
        </a>
    </div>
    <div>
        <p style="padding-top: 100px; padding-bottom: 100px; text-align: center;">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequuntur molestias
             accusamus iste voluptatem sed doloremque! Quos quidem quibusdam maiores unde quo
              error molestiae saepe sapiente dolorum, dicta aut porro. Dicta.</p>
    </div>
    <div class="bg-img">  
    </div>  

    <div>  
        <div>
        <strong style="font-size: 30px; position: absolute; padding-top: 30px;margin-bottom: 40px; padding-left: 40px;">Valon & Rijad Studios </strong>
        </div>
        <p style="padding-top: 100px; padding-bottom: 100px;   margin-left:600px;margin-right:600px;"> 

            I blerë nga Rijad Jakupi në vitin 2015, toka prej 330 hektarësh ndodhet në zemër të Prishtinës   
            në truallin historik të ish-UÇK-së. Studioja kryesore e filmave, një nga objektet më të mëdha të   
            prodhimit në vend, shfaq dyzet ndërtesa në Regjistrin Kombëtar të Vendeve Historike, dymbëdhjetë   
            skena zanore të ndërtuara për qëllime, 200 hektarë hapësirë ​​të gjelbër dhe një hapësirë ​​të larmishme. Studios Valon & Rijad  
        </p>  
        <strong><p style="text-align: right; padding-bottom:40px; padding-right: 20px;">Projektuar nga një krijues, për krijuesit.</p></strong>  
    </div>  
        
    <div class="bg-img" style="background-image: url('homepage_img/imazhi_3.jpg');">
        
             <div class="text_3">
                <p>Where one hundred years of Hollywood design meets 21st-century technology, our twelve state-of-the-art 
                    sound stages are built to meet the needs of production.
                </p>
            </div>
        
    </div>
    
    <div class="fot_location" style="padding-top: 30px; background-color: white; color: black; text-align: center; margin-right: 100px; border-top: 2px;">
        <p>Our Location   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="Contact.php" style="color: black;"> <img src="mapicon.png" style="width: 50px; margin-right: -10px ; margin-bottom: -20px; text-transform: uppercase; height: 50px;" alt="foto1">Pejton, Mreti Zogu I</a></p>
    </div>
    <br><br>
    <br><br>
    <footer class="footer">
        
        <div class="footer-links">
            <a href="login.php" class="footer-link">Log In</a>
            <span> || </span>
            <a href="login.php" class="footer-link">Register</a>
        </div>
    </footer>
    
    <script src="script.js"></script>
</body>  
</html>