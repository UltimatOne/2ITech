<?php

use PHPUnit\Framework\TestCase;

class EmailCheckTest extends TestCase
{
    public function testValidEmail()
    {
        $validator = new Services();
        $this->assertTrue(condition: $validator->emailCheck(email: "test.email@example.com"));
        $this->assertTrue(condition: $validator->emailCheck(email: "valid123@domain.fr"));
    }

    public function testInvalidEmail()
    {
        $validator = new Services();
        $this->assertFalse(condition: $validator->emailCheck(email: ".email@example.com")); // Point interdit au début
        $this->assertFalse(condition: $validator->emailCheck(email: "email@domain..com")); // Double point interdit
        $this->assertFalse(condition: $validator->emailCheck(email: "plainaddress")); // Pas de @
    }
}