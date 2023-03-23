<?php
namespace models;

class User {
    
    public $first_name; 
    public $last_name; 
    public $birthday; 
    public $birth_city; 
    public $regione_id; 
    public $provincia_id; 
    public $gender; 
    public $username; 
    public $password;
    
    public  static function arrayToUser(array $class_array)
    {
        $user = new User;
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {
            //al primo giro first_name
            $user->$class_attribute = $value_of_class_attribute;
        }

        return $user;
    }
}