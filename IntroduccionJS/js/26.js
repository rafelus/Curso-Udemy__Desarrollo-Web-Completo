// this

const reserva = {
    nombre: 'Juan',
    apellido: 'de la Torre',
    total: 500,
    pagado: false,
    informacion: function(){
        console.log(`El cliente ${this.nombre} ${this.apellido} reservo y el coste es de ${this.total}.`)
    }
}
console.log(reserva.informacion());