<?php

use crud\UserCRUD;
use models\User;

include "config.php";
include "form_in_php/test/test_autoload.php";

(new PDO(DB_DSN, DB_USER, DB_PASSWORD))->query("TRUNCATE TABLE user;");


    $crud = new UserCRUD();
    $user = new User();
    $user->first_name = "Mario";
    $user->last_name = "Rossi";
    $user->birthday = "2020-10-15";
    $user->birth_city = "Torino";
    $user->provincia_id = "96";
    $user->regione_id = "12";
    $user->gender = "M";
    $user->username = "mariorossi@mail.it";
    $user->password = md5('password');
    $crud->create($user);
    
    print_r($crud->read(1));

    //die();
    
    $user = $crud->read(1);
    $user->first_name = "Aldo";
    $user->last_name = "Blu";
    $user->birthday = "2021-03-12";
    $user->birth_city = "Roma";
    $user->id_provincia = "85";
    $user->id_regione = "7";
    $user->gender = "M";
    $user->username = "aldoblu@mail.com";
    $user->password = md5('password');
    
    $crud->update($user);

    print_r($crud->read(1));
