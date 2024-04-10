<?php

class Model
{
    private $db;
    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'movies';
        $user = 'root';
        $pwrd = '';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 
                $user, $pwrd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
                } catch (PDOException $e) {
                    die('Erreur : ' . $e->getMessage());
                };
    }

    public function manage()
    {
        
    }
}