<?php
include "DatabaseCrude.php";
include "Database.php";
include "User.php";

class ActionRegister
{
    private $register;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->register = new DatabaseCrude();

        if ($this->checkData($_POST)) {
            $myMessage = "Registracia prebehla úspešne, môžete sa prihlásiť.";
            header("Location: http://localhost/semestralka/login.php?msgrgstr=" . $myMessage);
        }
    }

    public function checkData($param)
    {
        session_start();
        $_SESSION['message'] = '';
        $username = $this->db->getDb()->real_escape_string($param['username']);
        $password = $this->db->getDb()->real_escape_string($param['password']);
        $name = $this->db->getDb()->real_escape_string($param["name"]);
        $last_name = $this->db->getDb()->real_escape_string($param['last_name']);
        $address = $this->db->getDb()->real_escape_string($param['address']);
        $email = $this->db->getDb()->real_escape_string($param['email']);
        $gender = $this->db->getDb()->real_escape_string($param['gender']);


        $getEmail = $this->db->getDb()->prepare("SELECT * FROM contact WHERE email=?");
        $getEmail->bind_param('s', $email);

        if ($getEmail->execute()) {
            $results = $getEmail->get_result();
            if ($results->num_rows > 0) {
                $mailErr = "Emailová adresa sa už používa.";
                header("Location: http://localhost/semestralka/registration.php?msgmail=" . $mailErr);
            } else {
                $getUsername = $this->db->getDb()->prepare("SELECT * FROM login WHERE username=?");
                $getUsername->bind_param('s', $username);

                if ($getUsername->execute()) {
                    $results = $getUsername->get_result();
                    if ($results->num_rows > 0) {
                        $usrnmErr = "Tento nick sa už používa.";
                        header("Location: http://localhost/semestralka/registration.php?msgusrnm=" . $usrnmErr);
                    } else {
                        $user = new User($username, $password, $name, $last_name, $address, $email, $gender);
                        try {
                            $this->register->insertUser($user);
                            return true;
                        } catch (Exception $e) {
                            echo 'Message: ' . $e->getMessage();
                        }
                    }
                }
            }
        }
        return false;
    }

}