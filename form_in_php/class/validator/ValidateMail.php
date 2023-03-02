<?php



class ValidateMail implements Validable {
    public function isValid(mixed $email): bool {
        //$valueWidoutSpace = trim(strip_tags($email));
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}