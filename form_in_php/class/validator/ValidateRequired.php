<?php

class ValidateRequired{
    
    public function isValid($value) 
    {
        $valueWidoutSpace = trim($value);
        
        //var_dump($value);
        //var_dump($valueWidoutSpace);

        
        if($valueWidoutSpace == ''){
            return false;
        }


        return $valueWidoutSpace;
    }
}