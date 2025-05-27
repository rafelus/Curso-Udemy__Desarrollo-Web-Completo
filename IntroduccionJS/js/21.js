// Arrow functions
const sumar = (num1, num2) => console.log(num1+num2);

sumar(5, 10);

const aprendiendo = (tecnologia) => console.log(`Aprediendo ${tecnologia}`);

aprendiendo('JavaScript');

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
meses.forEach( (mes) => {
    if(mes == 'Marzo'){
        console.log('Marzo si existe');
    }
});

// some 'ideal para array de objetos'
let resultado = carrito.some((producto) => producto.nombre === 'Telefono movil');
console.log(resultado);

// reduce
resultado = carrito.reduce((total, producto) => (total + producto.precio), 0);
console.log(resultado);

// filter
resultado = carrito.filter((producto) => producto.precio > 400);
console.log(resultado);

resultado = carrito.filter((producto) => producto.nombre == 'Telefono movil');
console.log(resultado);