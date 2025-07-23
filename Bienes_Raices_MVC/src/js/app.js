document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
});

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    // Muestra campos condicionales en el formulario de contacto
    const meteodoContacto = document.querySelectorAll('input[name="contacto[formaContacto]"]');
    meteodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
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

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');
    if(e.target.value == 'telefono'){
        contactoDiv.innerHTML = `
        <label for="telefono">Telefono</label>
        <input id="telefono" type="tel" placeholder="Tu numero" name="contacto[telefono]">

        <p>Eliga la fecha y la hora</p>
        <label for="fecha">Fecha:</label>
        <input id="fecha" type="date" name="contacto[fecha]">

        <label for="hora">Hora:</label>
        <input id="hora" type="time" min="09:00" max="18:00" name="contacto[hora]">`;
    }else{
        contactoDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input id="email" type="email" placeholder="example@example.com" name="contacto[email]">`;
    }
}