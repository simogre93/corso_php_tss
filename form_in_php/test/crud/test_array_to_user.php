<?php
use models\User;
require "form_in_php/test/test_autoload.php";
// //variabili di variabili
// $colore = "blu";
// //$$ prende il nome della variabile con un solo $
// echo $$colore;
// die();
# php form_in_php/test/crud/test_array_to_user.php

//simula post $_POST
$class_array = [
    "first_name"=>"Paolo", 
    "last_name"=> "Rossi",
    "birthday"=> "2002-12-10", 
    "birth_city"=> "Settimo T.se", 
    "regione_id"=> 12,
    "provincia_id"=> 96, 
    "gender"=> "M", 
    "username"=> "paolorossi@email.it", 
    "password"=>"ciccio"
];

// $class_name = User::class;
// $user = new $class_name;

// $user = new User;

// foreach ($class_array as $class_attribute => $value_of_class_attribute) {
//     //al primo giro first_name
//     $user->$class_attribute = $value_of_class_attribute;
// }

$user = User::arrayToUser($class_array);
if(get_class($user) ==  User::class){
    echo "test superato, è un oggetto\n";
    print_r($user);
}
