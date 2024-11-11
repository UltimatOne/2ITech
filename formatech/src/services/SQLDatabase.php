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
            $this->connection = new PDO(dsn: "mysql:host=$this->host;dbname=$this->dbname;charset=utf8", username: $this->user, password: $this->pswrd);
            $this->connection->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log(message: 'Connection error: ' . $e->getMessage());
        }
    }
    public static function getInstance(): mixed
    {
        if (self::$instance == null) {
            self::$instance = new SQLDatabase();
        }
        return self::$instance;
    }
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
