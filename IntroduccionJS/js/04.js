// Tipo de dato - String

const producto1 = "Monitor de 20 pulgadas";
const producto2 = String('Monitor de 30 pulgadas');
const producto3 = new String('Monitor de 40 pulgadas');
const producto4 = "Monitor de 20\"";

// lenght

console.log(producto1.length);
console.log(producto2);
console.log(producto3);
console.log(producto4);

// indexOf (retorna la posicion dentro del String)

console.log(producto1.indexOf('pulgadas'));
console.log(producto2.indexOf('tablet'));

// include (retorna la true o false)

console.log(producto1.includes('pulgadas'));
console.log(producto2.includes('tablet'));