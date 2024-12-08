function toggleMenu(){
const sideBar = document.querySelector('.sideBar');
const menuIcon = document.getElementById('menuIcon');
const navlink = document.querySelectorAll('.nav-link a')

if(sideBar.classList.contains('active')){
    sideBar.classList.remove('active');
    sideBar.classList.remove('visible');
    menuIcon.src = 'icon.menu/open.png';

   

}else{
    sideBar.classList.add ('active');
    sideBar.classList.add('visible');
    menuIcon.src = 'icon.menu/close.png';

    
}

}

