<?php

// print_r(__DIR__);//nome cartella dove si trova file
// echo "<br>";
// print_r(__FILE__);//nome del file

//autoload frontend
spl_autoload_register(function($className){
    
    $className = str_replace("\\","/",__DIR__."/class/".$className.'.php');
    require $className;
    
});