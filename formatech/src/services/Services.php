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
}
