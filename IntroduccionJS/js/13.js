const producto = {
    nombreProducto : 'Monitor 20 pulgadas',
    precio : 200,
    disponibilidad : true
}

const medidas = {
    peso : '2 kg',
    ancho : '1920px',
    alto : '1080px'
}

// Spread Operator

const nuevoProducto = {...producto, ...medidas};

console.log(producto);
console.log(medidas);
console.log(nuevoProducto);