// Funciones que devuelven resultados
function sumar(num1, num2){
    return num1+num2;
};

const resultado = sumar(2, 3);
console.log(resultado);

//---------------------------------//
let total = 0;

function agregarCarrito(precio){
    return total +=precio;
};
function calcularImpuesto(total){
    return total*1.21;
};

total = agregarCarrito(200);
console.log(total);
total = agregarCarrito(300);
console.log(total);
total = agregarCarrito(250);
console.log(total);
total = agregarCarrito(100);
console.log(total);
total = agregarCarrito(150);
console.log(total);

let totalPago = calcularImpuesto(total);
console.log(`El total a pagar es de: ${totalPago}`);