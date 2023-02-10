<?php

$first_name = filter_input(INPUT_POST,'first_name');

//whitespace char (TAB/BARRA SPAZIO) restituisce stringa di spazi | campo obbligatorio
//se non passo dal form restituisce NULL | errore
//se compilato restituisce una stringa | ok
//non compilo stringa "" | campo obbligatorio
var_dump($first_name);


?>



<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci, excepturi tempore eius voluptates voluptas, ut quas, itaque aperiam molestiae ex harum est obcaecati cum debitis cumque beatae saepe consequatur provident.</p>