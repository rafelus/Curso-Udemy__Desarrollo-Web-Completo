// Orden de las operaciones

let resultado;

resultado = 20+30*2; // el orden es el mismo que en una operación normal, primero la multiplicacion y despues la suma 20+(30*2)
console.log(resultado);
resultado = (100+200+300)*.2;
console.log(resultado);

// Incrementos

let puntaje;

puntaje = 10;
console.log(puntaje);
console.log(puntaje++);
console.log(++puntaje);
console.log(puntaje+= 3);
console.log(puntaje--);
console.log(--puntaje);
console.log(puntaje-= 3);