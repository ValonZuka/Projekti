<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V&R Studios</title>
    <link rel="stylesheet" href="contactstyle.css">
</head>
<body>
    <header>  
       
        <nav class="nav"> 
           
                <ul class="sideBar">
                    <li><a  href="#" onclick="hideMenu()"><img src="icon.menu/close.png" alt="me" height="0" width="0"></a></li>
                    <li><img src="Logo1.png" alt="Maca Image" style="margin-bottom: -150px; width: 100px; height: 70px;"></li>
                    <li><a  href="index.php">Home</a></li>
                    <li><a  href="stages.php">Stages</a></li>
                    <li><a  href="Sets.php">Sets</a></li>
                    <li><a  href="cars/supp.php">Support</a></li>
                    <li><a  href="cars/Cars.php">TPS Picture Cars</a></li>
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
        <p class="contact">
            <br>
            <br>
            Contact
        </p>
        <div class="call_us">
            <br>
            
            <p>Call us +383 45 994 323</p>
            <p><a href="https://www.google.com/maps?q=Eiffel+Tower,+Paris" target="_blank" style="text-decoration: underline; color:rgb(57, 62, 62) ;"><img src="mapicon.png" style="width: 100px; margin-right: -30px ; margin-bottom: -30px;" alt="mapi">Valon & Rijad Studios at Pristina</a></p>
            <p>V&R Studios Office </p>
            <p style="font-size: 35px;"> Pejton, Mreti Zogu I</p>
            <p><a href="https://forms.office.com/r/F3mWeBAdWJ?origin=lprLink" target="_blank" style="color: rgb(57, 62, 62); text-decoration: underline;">Studio Rental Inquiries</a></p>
        </div>
        <div class="social-box">
        <p> <br>follow us on social <br></p>
        <div>
            <a href="https://www.facebook.com/fadil.zekolli.3?mibextid=ZbWKwLn" target="_blank" ><img src="soc_logo/faclogo.jpg"  style="width: 25px; height: 25px;" alt="facebok"></a>
            <a href="https://www.instagram.com/valonzukaa/" target="_blank"><img src="soc_logo/inslogo.png"  style="width: 25px; height: 25px;" alt="facebok"></a>
            <a href="https://www.linkedin.com/in/valonzuka/" target="_blank"><img src="soc_logo/linklogo.jpg" style="width: 25px; height: 25px;" alt="facebok"></a>
            <a href="https://x.com/NUCLRGOLF/status/1872374342279106704/photo/1" target="_blank"><img src="soc_logo/twtlogo.jpeg" style="width: 25px; height: 25px;" alt="facebok"></a>
        </div>
    </div>
        <footer>
            <div class="Studio">
            <p >Studiomap</p>
        </div>
            <div class="get_d">
                    <span class="text " >Get Directions -></span>
                    <button class="btn">FROM NORTH</button>
                    <button class="btn">FROM SOUTH</button>
                    <button class="btn">FROM I-20</button>
            </div>
            
        </footer>
        
    <div class="overlay" id="overlay" onclick="hideMenu()"></div>
    <script src="contact.js"></script>
</body>
</html>