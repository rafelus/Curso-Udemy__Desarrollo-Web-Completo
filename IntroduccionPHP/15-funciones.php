<?php  
declare(strict_types=1);
include 'includes/header.php';

function sumar(int $n1 = 0, int $n2 = 0){
    echo $n1+$n2 .'<br>';
};

sumar(2,3);

include 'includes/footer.php';