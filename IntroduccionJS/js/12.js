"use strict" // define que el codigo se ejecute de forma extricta
// Objetos

const producto = {
    nombreProducto : 'Monitor 20 pulgadas',
    precio : 200,
    disponibilidad : true
}

// Object.freeze no te permite agregar o borrar atributos ni modificar los existentes.

Object.freeze(producto);
// producto.imagen= 'imagen.jpg'; // si se intenta agregar un atributo después del metodo Freeze da un error el programa si esta en modo estricto, si no lo está simplemente ignorará esta linea.

console.log(Object.isFrozen(producto));

// Object.seal no te permite agregar o borrar atributos pero si modificar los existentes.

Object.seal(producto);
// producto.imagen= 'imagen.jpg'; // si se intenta agregar un atributo después del metodo Seal da un error el programa si esta en modo estricto, si no lo está simplemente ignorará esta linea.

console.log(Object.isSealed(producto));

console.log(producto);