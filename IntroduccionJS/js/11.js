// Objetos

const producto = {
    nombreProducto : 'Monitor 20 pulgadas',
    precio : 200,
    disponibilidad : true
}

// Forma anterior

const preProducto = producto.precio;
const nomProducto = producto.nombreProducto;

console.log(preProducto);
console.log(nomProducto);

// Destructuring

const {precio, nombreProducto} = producto;

console.log(precio);
console.log(nombreProducto);