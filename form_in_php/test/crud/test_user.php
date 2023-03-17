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

$crud->create($user);

$result = $crud->read();
if(count($result) == 1) {
    echo "test utente inserito ok";
}


//print_r($result);

try {
    $crud->create($user);
} catch (\Throwable $th) {
    if($th->getMessage() == "23000"){
        echo "Test superato";
    };
}


