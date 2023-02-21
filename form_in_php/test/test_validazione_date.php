<?php

require "./form_in_php/class/validator/Validable.php";
require "./form_in_php/class/validator/ValidateDate.php";


$testDates = [
    [
        'input' => '21/02/2023',
        'expected' => '21/02/2023'
    ],
    [
        'input' => '21/02/2023    ',
        'expected' => '21/02/2023'
    ],
    [
        'input' => ' 21/02/2023    ',
        'expected' => '21/02/2023'
    ],
    [
        'input' => ' 21/02/2023',
        'expected' => '21/02/2023'
    ],
    [
        'input' => '21/15/23',
        'expected' => false
    ],
    [
        'input' => '40/03/23',
        'expected' => false
    ],
    [
        'input' => '21-02-23',
        'expected' => false
    ],
];

foreach ($testDates as $key => $test){
    $input = $test['input'];
    $expected = $test['expected'];

    $v = new ValidateDate();
    
    if($v->isValid($input) != $expected){
        echo "\nTest numero $key non superato mi aspettavo:";
        var_dump($expected);
        echo "\nma ho trovato";
        var_dump($v->isValid($input));
    };
}

