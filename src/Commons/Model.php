<?php

namespace Admin\Mvcoop2\Commons;

class Model
{
    protected \PDO|null $conn;

    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $post = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_NAME'];

        try {
            $this->conn = new \PDO("mysql:host=$host;port=$post;dbname=$dbname", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            // echo "Kết nối Thành Công";

            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $PDOException) {
            echo "Kết nối thất bại: " . $PDOException->getMessage();
            die;
        }
    }

    public function testConnect()
    {
        echo "<pre>";
        print_r($this->conn);
    }
    public function __destruct()
    {
        $this->conn = null;
    }
}
