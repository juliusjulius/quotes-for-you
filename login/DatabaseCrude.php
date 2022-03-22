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

        $stmtContact = $this->db->getDb()->prepare("INSERT INTO contact(id, name, last_name, address, email, gender) VALUES (?,?,?,?,?,?)");
        $stmtContact->bind_param('isssss', $last_id, $name, $lastName, $address, $email, $gender);
        $last_id = mysqli_insert_id($this->db->getDb());
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