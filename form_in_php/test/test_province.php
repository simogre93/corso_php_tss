<?php

use Registry\it\Provincia;

require './config.php';
require "./form_in_php/class/validator/Registry/it/Provincia.php";


$province = Provincia::all();

print_r($province);

?>