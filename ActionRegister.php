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
        $this->checkData($_POST);
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
                echo( "Email address is already taken!");    //$_SESSION['emailErr'] = "Email address is already taken!";
            } else {
                $getUsername = $this->db->getDb()->prepare("SELECT * FROM login WHERE username=?");
                $getUsername->bind_param('s', $username);

                if ($getUsername->execute()) {
                    $results = $getUsername->get_result();
                    if ($results->num_rows > 0) {
                        echo("Username is already taken!");     //$_SESSION['message'] = "Username is already taken!"; /
                    } else {
                        $user = new User($username, $password, $name, $last_name, $address, $email, $gender);
                        try {
                            $this->register->insertUser($user);
                        } catch (Exception $e) {
                            echo 'Message: ' . $e->getMessage();
                        }
                    }
                }
            }
        }
    }

}