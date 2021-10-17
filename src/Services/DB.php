<?php

namespace App\Services;

use App\Traits\Config;

class DB
{
    use Config;
    /**
     * @var mixed
     */
    private $driver;
    private $host;
    private $username;
    private $password;
    private $db_name;
    private $port;
    private $server;
    private $database;
    private static $pdo = null;

    /**
     * устанавливаем значения конфигов
     * DB constructor.
     */
    public function __construct()
    {
        $this->driver = $this->config('database.DB.driver');
        $this->host = $this->config('database.DB.host');
        $this->username = $this->config('database.DB.username');
        $this->password = $this->config('database.DB.password');
        $this->db_name = $this->config('database.DB.db_name');
        $this->port = $this->config('database.DB.port');
        $this->server = $this->config('database.DB.server');
        $this->database = $this->config('database.DB.database');
    }


    /**
     * Подключение к БД
     * @return \PDO
     */
    public function get() : \PDO
    {
        if (is_null(self::$pdo)) {
            $dsn = "$this->driver:$this->server=$this->host;$this->database=$this->db_name";
            $opt = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];
            self::$pdo = new \PDO($dsn, $this->username, $this->password,$opt);
        }
        return self::$pdo;
    }
}

