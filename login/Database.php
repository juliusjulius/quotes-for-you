<?php

class Database
{
    public $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'root', '', 'my_db');
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