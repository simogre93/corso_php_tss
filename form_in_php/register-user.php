<?php

// print_r($_POST);

$user = filter_input(INPUT_POST,'username',FILTER_VALIDATE_EMAIL);
// var_dump($user == false);

if(!$user){
    echo "\nla mail non è valida\n";
}else{
    echo "registrazione avvenuta con successo";
}
?>