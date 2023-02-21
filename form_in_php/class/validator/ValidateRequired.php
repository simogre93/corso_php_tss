<?php

class ValidateRequired implements Validable{
    
    public function isValid($value) 
    {
        $valueWidoutSpace = trim(strip_tags($value));
        
        //var_dump($value);
        //var_dump($valueWidoutSpace);

        
        if($valueWidoutSpace == ''){
            return false;
        }


        return $valueWidoutSpace;
    }
}