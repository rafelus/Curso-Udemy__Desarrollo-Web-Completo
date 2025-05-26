// Array methods

const meses = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo');

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

// forEach
meses.forEach(function(mes){
    if(mes == 'Marzo'){
        console.log('Marzo si existe');
    }
});

// includes
let resultado = meses.includes('Marzo');
console.log(resultado);

// some 'ideal para array de objetos'
resultado = carrito.some(function(producto){
    return (producto.nombre === 'Telefono movil');
})
console.log(resultado);

resultado = carrito.some(producto => producto.nombre === 'Telefono movil');
console.log(resultado);

// reduce
resultado = carrito.reduce(function(total, producto){
    return (total + producto.precio);
}, 0);
console.log(resultado);

resultado = carrito.reduce((total, producto) => (total + producto.precio), 0);
console.log(resultado);

// filter
resultado = carrito.filter(function(producto){
    return producto.precio > 400;
})
console.log(resultado);
resultado = carrito.filter(function(producto){
    return producto.nombre == 'Telefono movil';
})
console.log(resultado);