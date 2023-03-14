<?php
namespace validator;
/**
 * - [ok] preservare valore del campo di testo, non cancellarlo
 * - visualizzare il messaggio di errore per il singolo campo
 * - [ok] sapere se c'è un errore **is valid()**
 * - [ok] ripulire e controllare i valori (per sicurezza)
 * - ogni validazione hail suo messggio di errore
 * - impostare la classe di bootstrap is-invalid
 */
class ValidateRequired implements Validable{
    

    /** @var string rappresenta il valore messo nel form ripulito */
    private $value;
    private $message;
    private $hasMessage;
    /** se il valore è vlaido e se devo visualizzare il messaggio */
    private $valid;
    
    //__()magic method, innescati in casi particolari
    public function __construct($default_value='', $message='') {
        $this->value = $default_value;
        $this->valid = true;
        $this->message = $message;

    }

    public function isValid($value) 
    {
        $valueWidoutSpace = trim(strip_tags($value));
        
        
        if($valueWidoutSpace == ''){
            $this->valid = false;
            return false;
        }
        
        
        $this->valid = true;
        $this->value = $valueWidoutSpace;
        return $valueWidoutSpace;
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

