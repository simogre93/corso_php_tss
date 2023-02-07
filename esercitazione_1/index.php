<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Scrivere una funzione "array2ul" che dato un array come argomento
restituisce una stringa 
/**
return una stringa che rappresenta un elenco html (ul)
 */
String array2ul(Array $array)
echo array2ul(array("rosso","verde")); -->

<!-- <ul>
    <li>rosso</li>
    <li>verde</li>
</ul> -->
    <?php

    $sport = array("calcio", "nuoto", "basket");
    $film = array("inception", "interstellar", "dunkirk", "memento");
    $manga = array("dragon ball", "naruto", "one piece");

    function array2ul (array $array) {
        echo "<ul>";
        for ($i=0; $i < count($array); $i++) { 
            echo "<li>$array[$i]</li>"; 
        }
        echo "</ul>";
    }

    echo array2ul($sport);
    echo array2ul($film);
    echo array2ul($manga);

    ?>
</body>
</html>