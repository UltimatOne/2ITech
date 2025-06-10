<?php

use PHPUnit\Framework\TestCase;

class UpdateFieldsTest extends TestCase
{
    private $db;
    private $repository;

    protected function setUp(): void
    {
        // Simuler une connexion à la base de données avec PDO Mock
        $this->db = $this->createMock(PDO::class);
        $this->repository = new Model($this->db); // Assurez-vous d'avoir une classe qui gère `updateFields()`
    }

    public function testUpdateFieldsSuccess()
    {
        // Simuler une requête préparée qui réussit
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('rowCount')->willReturn(1);

        $this->db->method('prepare')->willReturn($stmtMock);

        // Données à mettre à jour
        $data = ['email' => 'new@mail.com', 'nom' => 'Jean'];

        $result = $this->repository->updateFields('utilisateurs', $data, 'id', 1);

        // Vérifier que la mise à jour a réussi
        $this->assertTrue($result);
    }

    public function testUpdateFieldsFailure()
    {
        // Simuler une requête qui échoue
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->method('execute')->willReturn(false);
        $stmtMock->method('rowCount')->willReturn(0);

        $this->db->method('prepare')->willReturn($stmtMock);

        $data = ['email' => 'new@mail.com'];

        $result = $this->repository->updateFields('utilisateurs', $data, 'id', 99); // ID qui n'existe pas

        $this->assertFalse($result);
    }
}
