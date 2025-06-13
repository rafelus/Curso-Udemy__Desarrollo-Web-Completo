<?php include 'includes/header.php';

$autenticado = true;
$admin = true;

if($autenticado || $admin) {
    echo 'Condición || se cumple';
}else {
    echo 'Condición || no se cumple';
}
echo '<br>';

if($autenticado && $admin) {
    echo 'Condición && se cumple';
}else {
    echo 'Condición && no se cumple';
}
echo '<br>';

// If anidados
$cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'informacion' => [
        'tipo' => 'Premium'
        ]
];
    
if(empty($cliente)){
    echo 'El array cliente esta vacio';
    echo '<br>';
}else {
    echo 'El array cliente no esta vacio';
    echo '<br>';
    if($cliente['saldo'] > 0){
        echo 'El cliente dispone de saldo';
        echo '<br>';
    }else {
        echo 'El cliente no dispone de saldo';
        echo '<br>';
    }
}

// else if
if($cliente['saldo'] > 0){
    echo 'El cliente tiene saldo';
    echo '<br>';
}else if($cliente['informacion']['tipo'] == 'Premium'){
    echo 'El cliente no tiene saldo, pero es Premium';
    echo '<br>';
}else {
    echo 'El cliente no tiene saldo y no es Premium';
    echo '<br>';
}

// Switch
$tecnologia = 'JavaScript';

switch ( $tecnologia){
    case 'PHP':
        echo 'PHP es un lenguaje de backend';
        break;
    case 'JavaScript':
        echo 'JavaScript es un lenguaje de frontend';
        break;
    case 'SQL':
        echo 'SQL es un lenguaje de bases de datos';
        break;
    case 'Java':
        echo 'Java es un lenguaje de backend';
        break;
    case 'CSS':
        echo 'CSS es un lenguaje de frontend';
        break;
    default:
        echo 'No hay lenguaje definido';
        break;
}

include 'includes/footer.php';