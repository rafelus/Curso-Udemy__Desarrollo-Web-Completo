// POO

// Object literal
const producto = {
    nombre: 'Tablet',
    precio: 300
}

// Object Constructor
function Producto(nombre, precio) {
    this.nombre = nombre;
    this.precio = precio;
}

// Prototype permite crear funciones que solo se utilizan en un objeto en especifico
Producto.prototype.formatearProducto = function() {
    return `El producto ${this.nombre} tiene un precio de ${this.precio}.`;
}

const producto2 = new Producto('Monitor curvo de 49 pulgadas', 800);
const producto3 = new Producto('Laptop', 300);

// Object Constructor
function Cliente(nombre, apellido) {
    this.nombre = nombre;
    this.apellido = apellido;
}

// Prototype permite crear funciones que solo se utilizan en un objeto en especifico
Cliente.prototype.formatearCliente = function() {
    return `El cliente ${this.nombre} ${this.apellido} ha sido logueado.`;
}

const cliente2 = new Cliente('Juan', 'Garcia');
const cliente3 = new Cliente('Jose', 'Espinosa');


console.log(producto2);
console.log(producto3);

console.log(producto2.formatearProducto());
console.log(producto3.formatearProducto());

console.log(cliente2);
console.log(cliente3);

console.log(cliente2.formatearCliente());
console.log(cliente3.formatearCliente());