// Estructuras de control

const puntaje = 1000;

if(puntaje === 1000){
    console.log('Si, el puntaje es 1000');
}else {
    console.log('No es 1000');
}

if(puntaje !== 1000){
    console.log('No es 1000');
}else {
    console.log('Si, el puntaje es 1000');
}

const efectivo = 1000;
const carrito = 800;

if(efectivo > carrito){
    console.log('Puedes pagar');
}else {
    console.log('Fondos insuficientes');
}

const rol = 'EDITOR';

if (rol === 'ADMINISTRADOR'){
    console.log('Tienes acceso total al sistema');
}else if(rol === 'EDITOR'){
    console.log('Tienes un acceso limitado al sistema');
}else {
    console.log('No puedes acceder al sistema');
}