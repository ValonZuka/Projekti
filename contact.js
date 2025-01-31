function toggleMenu(){
    const sideBar = document.querySelector('.sideBar');
    const menuIcon = document.getElementById('menuIcon');
    const overlay = document.getElementById('overlay');
    
    if(sideBar.classList.contains('active')){
        hideMenu(); 
    
       
    
    }else{
        sideBar.classList.add ('active');
        sideBar.classList.add('active');
        menuIcon.src = 'icon.menu/close.png';
        document.body.style.overflow = 'hidden';
        
     }
    }
    function hideMenu(){
        const sideBar = document.querySelector('.sideBar');
        const overlay = document.getElementById('overlay');
        const menuIcon = document.getElementById('menuIcon');
    
        sideBar.classList.remove('active');
        menuIcon.src = 'icon.menu/open.png';
        
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    
    
    }