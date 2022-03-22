<?php
//include "User.php";
//include "Database.php";

class DatabaseCrude
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insertUser(User $user)
    {
        $stmtLogin = $this->db->getDb()->prepare("INSERT INTO login(username, password) VALUES (?,?)");
        $stmtLogin->bind_param('ss', $username, $password);
        $username = $user->getUsername();
        $password = $user->getPassword();

        if (!$stmtLogin->execute()) {
            throw new Exception("Execute failed: ({$stmtLogin->errno}, {$stmtLogin->error}");
        }

        $stmtContact = $this->db->getDb()->prepare("INSERT INTO contact(username, name, last_name, address, email, gender) VALUES (?,?,?,?,?,?)");
        $stmtContact->bind_param('ssssss',  $username, $name, $lastName, $address, $email, $gender);
        $name = $user->getName();
        $lastName = $user->getLastName();
        $address = $user->getAddress();
        $email = $user->getEmail();
        $gender = $user->getGender();

        if (!$stmtContact->execute()) {
            throw new Exception("Execute failed: ({$stmtContact->errno}) {$stmtContact->error}");
        }
    }


}