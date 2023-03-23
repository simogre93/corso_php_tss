<?php

# php form_in_php/test/test_regioni.php

use Registry\it\Regione;

require './config.php';
require "./form_in_php/class/validator/Registry/it/Regione.php";

//istanza di classe e un suo metodo
//$regioni = new Regione();
//$regioni->all();

//metodo statico per tutte le regioni, può essere utilizzato senza creare istanza
//come si usa una metodo statico
$regioni = Regione::all();



?>