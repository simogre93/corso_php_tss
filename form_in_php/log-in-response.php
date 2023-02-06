<?php
/**
 *$ = variabile
 *"/" =  stringa
 * se non c'è niente è una costante
 */
$test = filter_input(INPUT_GET,'email',FILTER_VALIDATE_EMAIL);

if($test == false){
    echo "\nla mail non è valida\n";
}else{
    echo "la mail è valida: $test";
}
?>