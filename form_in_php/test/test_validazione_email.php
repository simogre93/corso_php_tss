<?php

//$files = scandir("./form_in_php/class/validator"); //fa vedere la posizione dave si è
//print_r($files);

//cosa prendere, come import in java
require "./form_in_php/class/validator/ValidateMail.php";

$emails = [
    'a', ' ', 'a@', 'mario', '<h1>ciccio</h1>', 'a<@.it'
];


$v = new ValidateMail();

//v.isValid('a') . in java, -> in php

foreach ($emails as $index => $email){
    //da dove arrivano i dati
    if($v->isValid($emalil) == false) {
        echo "test superato per $email\n";
    }else {
        echo "test numero $index non superato per [$email]\n";
    };
    //$v->getMessage();
}
