<?php

Class ValidateDate implements Validable {

    public function isValid($value) 
    {
        $date = trim(strip_tags($value));
        $dataCorretta = DateTime::createFromFormat('d/m/Y', $date);

         if($dataCorretta && $dataCorretta->format('d/m/Y') === $date){
            return $dataCorretta->format('d/m/Y');
         }else {
             return false;
         }


        return $dataCorretta;
    }
}