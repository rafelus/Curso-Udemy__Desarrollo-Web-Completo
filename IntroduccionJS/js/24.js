// For Loop
for(let i=0; i<=10; i++){
    console.log(i);
}

for(let i=1; i<=10; i++){
    if(i%2 === 0){
        console.log(`El número ${i} es par.`)
    }else {
        console.log(`El número ${i} es impar.`)
    }
}

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

for(let i=0; i<carrito.length; i++){
    console.log(carrito[i].nombre);
}

// while Loop
let indice = 1;

while(indice<=10){
    console.log(indice);
    indice++;
}

indice = 1;

while(indice<=100){
    if(indice%2 === 0){
        console.log(`El número ${indice} es par.`);
    }
    indice++;
}

// do-while Loop
let indice2 = 1;

do {
    console.log(indice2);
    indice2++;
}while(indice2<=10)