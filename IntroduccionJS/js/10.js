// Objetos

const nombreProducto = 'Monitor 20 pulgadas';
const precio = 200;
const disponibilidad = true;

const producto = {
    nombreProducto : 'Monitor 20 pulgadas',
    precio : 200,
    disponibilidad : true
}

// LLamadas a los atributos

console.log(producto);
console.log(producto.nombreProducto);
console.log(producto.precio);
console.log(producto.disponibilidad);

console.log(producto['nombreProducto']);
console.log(producto['precio']);
console.log(producto['disponibilidad']);

// Modificar Objetos

producto.imagen = 'imagen.jpg'; // Agrega el atributo imagen a la variable producto
console.log(producto);

delete producto.disponibilidad; // Borra el atributo imagen a la variable producto
console.log(producto);