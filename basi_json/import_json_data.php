<?php

//ottiene file esterno
//$province = file_get_contents('https://gist.githubusercontent.com/stockmind/8bcbbf9ac41bc196401b96084ec8c5d3/raw/2edda5cd32eb2b99d3d9b45413bc8b1135564260/province-italia.json');


//crea file all'interno dell'editor
//file_put_contents('province.json', $province);

$province = file_get_contents('province.json');

//echo $province;

//decodifica file in formato che php capisce
$province_object = json_decode($province);

print_r($province_object[4]);

// foreach ($province_object as $provincia_object) {
//     echo $provincia_object->nome." (".$provincia_object->sigla.")\n";
// }


$province_associative_array = json_decode($province, true);

print_r($province_associative_array[4]);

foreach ($province_associative_array as $provincia) {
    echo "{$provincia['nome']} ({$provincia['sigla']})\n";
}