// querySelector
const heading = document.querySelector('.header__texto h2'); // querySelector puede acceder a todas las propiedades del objeto llamado. Devuelve 0 o 1 elemento.
heading.textContent = 'Nuevo heading';
console.log(heading);

// querySelectorAll
const enlace = document.querySelectorAll('.navegacion a'); // querySelectorAll devuelve un array todos los elementos llamados.
enlace[0].textContent = 'Nuevo texto para enlace';
enlace[0].classList.add('Nueva-clase');
enlace[0].classList.remove('Nueva-clase');
console.log(enlace);

// getElementById
const heading2 = document.getElementById('heading');
console.log(heading2);

// Generar un nuevo enlace
const nuevoEnlace = document.createElement('A');

// Agregar el HREF
nuevoEnlace.href = 'nuevo-enlace.html';

// Agregar el texto
nuevoEnlace.textContent = 'Tienda Virtual';

// Agregar la clase
nuevoEnlace.classList.add('navegacion_enlace');

// Agregarlo al documento
const navegacion = document.querySelector('.navegacion');
navegacion.appendChild(nuevoEnlace);

// Eventos
// console.log(1);

// window.addEventListener('load', function(){     // load espera a que el JS y los archivos que dependen del HTML estén listos.
//     console.log(2);
// });
// window.onload = function(){
//     console.log(3);
// };
// document.addEventListener('DOMContentLoaded', function(){   // DOMContentLoaded solo espera que se descargue el HTML.
//     console.log(4);
// });

// console.log(5);

// window.onscroll = function(){
//     console.log('scrolling...');
// }

// Seleccionar elementos y asociarles un evento
// const btnEnviar = document.querySelector('.boton--primario');
// btnEnviar.addEventListener('click', function(evento){
//     console.log(evento);
//     evento.preventDefault();
//     console.log('enviando formulario');
// })

// Eventos de los Inputs y Textarea
const datos = {
    nombre: '',
    email: '',
    mensaje: ''
};

const nombre = document.querySelector('#nombre');
const email = document.querySelector('#email');
const mensaje = document.querySelector('#mensaje');
const formulario = document.querySelector('.formulario');

nombre.addEventListener('change', leerTexto);
email.addEventListener('change', leerTexto);
mensaje.addEventListener('change', leerTexto);

// Elemento de Submit
formulario.addEventListener('submit', function(evento){
    evento.preventDefault();

    //Validar el formulario
    const {nombre, email, mensaje} = datos;
    if(nombre === ''|| email === ''|| mensaje === ''){
        mostarAlerta('Todos los campos deben rellenarse', false);
        return; //Corta la ejecucion del codigo
    }else{
        mostarAlerta('Formulario enviado correcto', true);
    }
})

function leerTexto(e) {
    datos[e.target.id] = e.target.value;
    // console.log(e.target.value);
    // console.log(datos);
};

// Muestra Alerta en pantalla del formulario
function mostarAlerta(mensaje, estado = false){
    const alerta = document.createElement('P');
    alerta.textContent = mensaje;
    if(!estado){
        alerta.classList.add('error');
    }else if(estado){
        alerta.classList.add('envio');
    }
    formulario.appendChild(alerta);
    // Desaparecer alerta despues de 3seg.
    setTimeout(() => {
        alerta.remove();
    }, 3000);
}
