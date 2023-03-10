<?php

class Regione {

    public static function all()
    {
        try {
            $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            //simile query(), più lunga ma fa più cose, è più sicuro
            $stm = $conn->prepare('SELECT * FROM regioni;');
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }


}


?>