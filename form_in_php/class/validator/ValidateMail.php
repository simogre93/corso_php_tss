<?php



class ValidateMail implements Validable {

    
    private $value;
    private $message;
    private $valid;

    public function __construct($default_value='', $message='la mail è obbligatoria') {
        $this->value = $default_value;
        $this->valid = true;
        $this->message = $message;

    }

    public function isValid(mixed $email): bool {
        $validazione = filter_var($email, FILTER_VALIDATE_EMAIL);
        

        if($validazione == ''){
            $this->valid = false;
            return false;
        } 

        $this->valid = true;
        $this->value = $validazione;
        return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
    

    public function getValue()
    {
        return $this->value;
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
