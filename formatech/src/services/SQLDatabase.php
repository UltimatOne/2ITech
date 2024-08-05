<?php


class SQLDatabase
{
    private static $instance = null;
    private $connection;
    private $host;
    private $dbname;
    private $user;
    private $pswrd;

    private function __construct()
    {
        include './dbpass.php';
        
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pswrd = $pswrd;

        try {
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->user, $this->pswrd);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log('Connection error: ' . $e->getMessage());
        }
    }
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new SQLDatabase();
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->connection;
    }
}
