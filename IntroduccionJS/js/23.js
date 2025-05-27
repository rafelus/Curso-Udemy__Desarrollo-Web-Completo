// Switch
const metodoPago = 'PAYPAL';

switch (metodoPago){
    case 'TARJETA':
        console.log('Pagaste con tarjeta');
        break;
    case 'BIZUM':
        console.log('Pagaste con bizum');
        break;
    case 'PAYPAL':
        console.log('Pagaste con PayPal');
        break;
    case 'EFECTIVO':
        console.log('Pagaste con efectivo');
        break;
    case 'TRANSFERENCIA':
        console.log('Pagaste con transferencia');
        break;
    default:
        console.log('Metodo desconocido');
        break;
}