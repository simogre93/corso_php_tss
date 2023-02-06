<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $nome = "Mario";
        $eta = 50;
        $passatempi = array("tennis", "cinema", "no sport");
        
        //dichiarazione funzione
        function saluta($nome){
            return "Ciao io sono $nome, come va?";
            // return "Ciao io sono " + $nome + ", come va?" in javascript
            //` Ciao io sono ${nome}, come va` //template literal di javscript
        }
        
        //tutte le istruzioni dopo non vengono eseguite
        //die("ciao");

        echo "<h1>scrivo un contenuto sullo schermo</h1>"; //crea output, di solito stringa
        //chiamata funzione
        echo saluta("Gianni"); 
        echo "<p>".saluta($nome)."</p>";
        echo "<div>".saluta($nome)."</div>";

        //echo $passatempi; errore perchè echo può visualizzare solo stringhe e numeri

        //passatampi.length in javascript
        echo "<ul>";
        for ($i=0; $i < count($passatempi); $i++) { 
            echo "<li>$passatempi[$i]</li>"; // $passatempi[0], $passatempi[1], $passatempi[2]      
        }
        echo "</ul>";

        $frase = "ciao sono una frase";
        $frase .= "sono un altro pezzo della frase";

    ?>

</body>
</html>