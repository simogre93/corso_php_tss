<?php
/**
 * - preservare valore del campo di testo, non cancellarlo
 * - visualizzare il messaggio di errore per il singolo campo
 * - sapere se c'è un errore **is valid()**
 * - ripulire e controllare i valori
 * - ogni validazione hail suo messggio di errore
 * - impostare la classe di bootstrap is-invalid
 */
class ValidateRequired implements Validable{
    
    public function isValid($value) 
    {
        $valueWidoutSpace = trim(strip_tags($value));
        
        if($valueWidoutSpace == ''){
            return false;
        }


        return $valueWidoutSpace;
    }
}