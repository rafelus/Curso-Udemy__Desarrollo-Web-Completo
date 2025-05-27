// Promises
const ususarioAutenticado = new Promise(function(resolve, reject){
    const auth = true;
    if(auth){
        resolve('Usuario Autenticado');      // El Promise se cumple
    }else{
        reject('No se puede iniciar sesion');       // El Promise no se cumple
    }
})

console.log(ususarioAutenticado);

ususarioAutenticado 
    .then(function(resultado){
        console.log(resultado);
    })
    .catch(function(error){
        console.log(error);
    })

ususarioAutenticado 
    .then((resultado) => console.log(resultado))
    .catch((error) => console.log(error))

// Existen 3 valores posibles en el Promise
    // Pending: no se ha cumplido pero tampoco se ha rechazado
    // Fulfilled: ya se cumplio el Promise
    // Reject: se rechazo o no se pudo cumplir el Promise