// POO - Clases en JavaScript

class Producto {
    constructor(nombre, precio){
        this.nombre = nombre;
        this.precio = precio;
    }
    formatearProducto() {
    return `El producto "${this.nombre}" tiene un precio de ${this.precio} euros.`;
    }
    retornarPrecio() {
    return `Este producto tiene un precio de ${this.precio} euros.`;
    }
}

const producto1 = new Producto('Monitor curvo de 49 pulgadas', 800);
const producto2 = new Producto('Laptop', 300);

console.log(producto1);
console.log(producto2);

console.log(producto1.formatearProducto());
console.log(producto2.formatearProducto());
console.log(producto1.retornarPrecio());
console.log(producto2.retornarPrecio());

//POO - Herencia
class Libro extends Producto {
    constructor(nombre, precio, ISBN){
        super(nombre, precio);
        this.ISBN = ISBN;
    }
    mostrarTitulo(){
        return `El titulo de este libro es "${this.nombre}".`;
    }
    mostrarISBN(){
        return `El titulo "${this.nombre}" tiene el ISBN: ${this.ISBN}.`;
    }
}

const libro1 = new Libro('JavaScript la revolucion', 120, '311237981273' );

console.log(libro1);

console.log(libro1.mostrarTitulo());
console.log(libro1.mostrarISBN());
console.log(libro1.formatearProducto());