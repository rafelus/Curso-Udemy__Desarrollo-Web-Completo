// Declaracion de Funciones con parametros
function sumar(num1 = 0, num2 = 0){     // '= 0' es un valor por defecto, asi en el caso de no pasar alguno de los parametros no da error
    console.log(num1+num2);
};
sumar(9, 11);
sumar(3, 6);
sumar(3);

// Expresion de la funcion
const sumar2 = function(num1, num2) {
    console.log(num1+num2);
}
sumar2(5, 10);