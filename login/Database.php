<?php

class Database
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli(getenv('HOST'), getenv('USERNAME'), getenv('PASSWORD'), getenv('DBNAME'));
        mysqli_set_charset($this->db,"utf8");
        $this->checkDBErrors();
    }

    private function checkDBErrors()
    {
        if ($this->db->error) {
            die("DB CHYBA:" . $this->db->error);
        }
    }

    /**
     * @return mysqli
     */
    public function getDb()
    {
        return $this->db;
    }

    public function __destruct()
    {
        $this->db->close();
    }
}