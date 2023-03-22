<?php

use crud\UserCRUD;
use models\User;

include "config.php";
include "form_in_php/test/test_autoload.php";

(new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user");
$crud = new UserCRUD();
$user = new User();

$user->first_name = "Mario";
$user->last_name = "Rossi";
$user->birthday = "2017-01-01";
$user-> birth_city = "Torino";
$user->regione_id = 12;
$user->provincia_id = 96;
$user->gender = "M";
$user->username = "mariorossi@email.com";
$user->password =  md5('password');

$result = $crud->read();
if($result === false){
    echo "\ndatabase vuoto\n";
}
$crud->create($user);

$result = $crud->read(1);
if(class_exists(User::class) && get_class($result) == User::class){
    echo "\ntest utente esistente superato\n";
}
//print_r($result);

$result = $crud->read(2);
if($result === false){
    echo "\ntest utente non esistente superato\n";
}
//print_r($result);


$result = $crud->read();
if(is_array($result) && count($result) ===1){
    echo "\nricerca di tutti gli utenti (1)\n";
}
//print_r($result);

$crud->delete(1);
$result = $crud->read(1);
if($result === false){
    echo "\ntest utente con id 1 eliminato\n";
}
