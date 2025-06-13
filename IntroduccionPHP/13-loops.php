<?php include 'includes/header.php';

// while
$i = 0;
while($i<10) {
    $i++;
    echo $i . '<br>';
}

// do while
$i = 0;
do {
    $i++;
    echo $i . '<br>';
}while($i<10);

// for
for($i=0; $i<10; $i++){
    echo $i . '<br>';
};

// FizzBuzz
for($i=0; $i<100; $i++){
    if($i%3 == 0 && $i%5 == 0){
        echo $i . 'FIZZ BUZZ' . '<br>';
    }else if($i%3 == 0){
        echo $i . 'FIZZ' . '<br>';
    }else if($i%5 == 0){
        echo $i . 'BUZZ' . '<br>';
    }
};

// foreach
$clientes = ['Pedro','Juan','Karen'];
foreach($clientes as $cliente){
    echo $cliente .'<br>';
}

$cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'tipo' => 'Premium'
];
foreach($cliente as $key => $valor){
    echo $key .': ' . $valor . '<br>';
}

include 'includes/footer.php';