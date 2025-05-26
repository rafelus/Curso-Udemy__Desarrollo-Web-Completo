// Arreglos o Arrays

const numeros = [10, 20, 30, 40, 50];

console.log(numeros);
console.table(numeros);         // Muestra los valores del array en forma de tabla

const meses = new Array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo');

console.log(meses);
console.table(meses);

const arreglo = ['Hola', 1, true, 'si', null, {nombre: 'Juan', trabajo: 'programador'}, [1,2,3]];

console.log(arreglo);
console.table(arreglo);

// Acceder a los valores de un array
console.log(numeros[4]);

// Acceder a la longitud de un array
console.log(meses.length);

// Iterar todos los elementos de un array
numeros.forEach( function(num){
    console.log(num);
});
meses.forEach( function(mes){
    console.log(mes);
});

// Agregar nuevos elementos

numeros.push(60,70,80);         // Añade al final del array
numeros.unshift(-30,-20,-10);   // Añade al principio del array

console.table(numeros);

// Quitar elementos

numeros.pop();                  // Elimina al final del array
numeros.shift();                // Elimina al principio del array
numeros.splice(0, 2)            // El primer indice es desde que posicion se va a eliminar y el segundo cuantos se quiere eliminar

console.table(numeros);

// Rest Operator o Spread Operator

let nuevoArreglo = [...meses, 'Junio'];
console.table(nuevoArreglo);
nuevoArreglo = ['Diciembre', ...meses];
console.table(nuevoArreglo);
nuevoArreglo = ['Diciembre', ...meses, 'Junio','Julio','Agosto', 'Septiembre','Octubre','Noviembre'];
console.table(nuevoArreglo);