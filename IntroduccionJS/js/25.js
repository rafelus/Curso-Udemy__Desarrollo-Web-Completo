// forEach
const carrito = [
    {nombre: 'Monitor 20 pulgadas', precio: 500},
    {nombre: 'Television 50 pulgadas', precio: 700},
    {nombre: 'Tablet', precio: 300},
    {nombre: 'Auriculares', precio: 200},
    {nombre: 'Teclado', precio: 50},
    {nombre: 'Telefono movil', precio: 1200},
    {nombre: 'Altavoces', precio: 300},
    {nombre: 'Laptop', precio: 800}
];

carrito.forEach(function(producto){
    console.log(producto.nombre);
});

carrito.forEach((producto) => console.log(producto.nombre));

// map
let array2 = carrito.map(function(producto){
    console.log(producto.nombre);
});

array2 = carrito.map((producto) => `${producto.nombre} - ${producto.precio}`);
console.log(array2);