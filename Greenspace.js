let currentSlide = 0;  

function showSlide(index) {  
    const slides = document.querySelectorAll('.slide');  
    const totalSlides = slides.length;  

    if (index >= totalSlides) currentSlide = 0;  
    if (index < 0) currentSlide = totalSlides - 1;  

    const offset = -currentSlide * 100;  
    document.querySelector('.slides').style.transform = `translateX(${offset}%)`;  
}  

function changeSlide(direction) {  
    currentSlide += direction;  
    showSlide(currentSlide);  
}  

showSlide(currentSlide);  

document.querySelector('footer button').addEventListener('click', function() {  
    const email = document.querySelector('footer input').value;  
    if (email) {  
        alert("Thank you for signing up with email: " + email);  
        document.querySelector('footer input').value = "";  
    }  
});

function toggleMenu() {
    const sideBar = document.querySelector('.sideBar');
    const menuIcon = document.getElementById('menuIcon');
    const navLink = document.querySelector('.nav-link'); 
    
    if(sideBar.classList.contains('active'))        
    {
        sideBar.classList.remove('active');
        sideBar.classList.remove('visible');
        menuIcon.src = 'icon.menu/open.png';
        navLink.classList.remove('hide-nav'); 
    } 
    else {
        sideBar.classList.add('active');
        sideBar.classList.add('visible');
        menuIcon.src = 'icon.menu/close.png';
        navLink.classList.add('hide-nav');  
    }
}

    function redirectToRegister() {
        let email = document.getElementById("signupEmail").value;
        if (email) {
            window.location.href = "login.html?email=" + encodeURIComponent(email);
        }
    }