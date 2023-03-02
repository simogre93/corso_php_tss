<?php

Class ValidateDate implements Validable {

    private $message;
    private $valid;

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

    public function getMessage()
    {
        return $this->message;
    }

    public function getValid()
    {
        return $this->valid;
    }
}