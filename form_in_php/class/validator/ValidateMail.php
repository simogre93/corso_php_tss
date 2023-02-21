<?php



class ValidateMail implements Validable {
    public function isValid(mixed $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}