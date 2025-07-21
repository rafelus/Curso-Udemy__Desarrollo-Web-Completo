document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
};

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }
}
function darkMode(){
    const preferDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    if(preferDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }
    const botonDark = document.querySelector('.dark-mode-boton');
    botonDark.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
};