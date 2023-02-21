<?php

Class ValidateDate implements Validable {

    public function isValid($value) 
    {
        $date = trim(strip_tags($value));
        $dataCorretta = DateTime::createFromFormat('d/m/Y', $date);

         if($dataCorretta){
            return $dataCorretta -> format('d/m/Y');
         }else {
             return $dataCorretta;
         }


        return $dataCorretta;
    }
}