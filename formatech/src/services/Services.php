<?php

class Services
{
    private function __construct() {}

    public function test_input($data): string
    {
        $data = trim(string: $data);
        $data = stripslashes(string: $data);
        $data = htmlspecialchars(string: $data);
        return $data;
    }

    public function checkSecurityPassword($password): bool
    {
        // Check password
        // 8 characters, uppercase letter, lowercase letter, number and authorized special character #?!@$%^&*-
        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';

        return preg_match(pattern: $pattern, subject: $password);
    }

    public function emailCheck ($email): bool
    {
        
        $pattern = '/^((?!\.)[\w-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/i';
        return preg_match(pattern: $pattern, subject: $email);

    }
}
