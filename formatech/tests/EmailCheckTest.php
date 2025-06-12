<?php

use PHPUnit\Framework\TestCase;
use App\Services\Services;
class EmailCheckTest extends TestCase
{
    private $validator;

    protected function setUp(): void
    {
        $this->validator = new Services();
    }

    public function testValidEmail(): void
    {
        $this->assertTrue(condition: $this->validator->emailCheck(email: "test.email@example.com"));
        $this->assertTrue(condition: $this->validator->emailCheck(email: "valid123@domain.fr"));
        $this->assertTrue(condition: $this->validator->emailCheck(email: "valid123@domain.co.uk"));
        $this->assertTrue(condition: $this->validator->emailCheck(email: "valid-123@domain.fr"));
        $this->assertTrue(condition: $this->validator->emailCheck(email: "valid_123@domain.com"));
        $this->assertTrue(condition: $this->validator->emailCheck(email: "VALID123@domain.fr"));
    }

    public function testInvalidEmail(): void
    {
        $this->assertFalse(condition: $this->validator->emailCheck(email: ".email@example.com")); // Point interdit au début
        $this->assertFalse(condition: $this->validator->emailCheck(email: "email@domain..com")); // Double point interdit
        $this->assertFalse(condition: $this->validator->emailCheck(email: "email@domain")); // pas de domaine
        $this->assertFalse(condition: $this->validator->emailCheck(email: "plainaddress")); // Pas de @
    }
}