<?php

use PHPUnit\Framework\TestCase;

class EmailCheckTest extends TestCase
{
    public function testValidEmail()
    {
        $validator = new Services();
        $this->assertTrue($validator->emailCheck("test.email@example.com"));
        $this->assertTrue($validator->emailCheck("valid123@domain.fr"));
    }

    public function testInvalidEmail()
    {
        $validator = new Services();
        $this->assertFalse($validator->emailCheck(".email@example.com")); // Point interdit au début
        $this->assertFalse($validator->emailCheck("email@domain..com")); // Double point interdit
        $this->assertFalse($validator->emailCheck("plainaddress")); // Pas de @
    }
}