<?php



class ValidateMail implements Validable {

    private $message;
    private $valid;

    public function isValid(mixed $email): bool {
        //$valueWidoutSpace = trim(strip_tags($email));
        return filter_var($email, FILTER_VALIDATE_EMAIL);
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