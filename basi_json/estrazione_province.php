<?php

include "config.php";

//file da aprire
$province_string = file_get_contents('province.json');
$province_object = json_decode($province_string);

$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn,DB_USER,DB_PASSWORD);
    
    $conn->query('TRUNCATE TABLE province');

    foreach ($province_object as $provincia) {
        
        $provincia_nome = addslashes($provincia->nome);
        $provincia_sigla = $provincia->sigla;
        $regione_id = $provincia->regione;
        
        
        $id_query = $conn->query("SELECT regione_id FROM regioni WHERE nome=\"$provincia->regione\"");
        $regione_id = $id_query->fetchColumn();
        
        $sql = "INSERT INTO province (nome, sigla, regione_id) VALUES ('$provincia_nome' , '$provincia_sigla' , '$regione_id');";
        echo $sql ."\n";
        $conn->query($sql);
    }
    

} catch (\Throwable $th) {
    throw $th;
}

?>