<?php
include "DatabaseCrude.php";
include "Database.php";

class ActionLogin
{
    private $login;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        $this->login = new DatabaseCrude();

        if ($this->checkData($_POST)) {
            header("location:home.php");
        } else {
            $myMessage = "Nepodarilo sa prihlásiť, zlý nick, alebo heslo.";
            header("Location: http://localhost/semestralka/login.php?mymessage=" . $myMessage);

        }
    }

    public function checkData($param)
    {
        $username = $this->db->getDb()->real_escape_string($param['username']);
        $password = $this->db->getDb()->real_escape_string($param['password']);

        $getUsername = $this->db->getDb()->prepare("SELECT * FROM login WHERE username=?");
        $getUsername->bind_param('s', $username);
        if ($getUsername->execute()) {
            $results = $getUsername->get_result();
            if ($results->num_rows > 0  ) {
                $userData = $results->fetch_array();
                if ( password_verify($password, $userData['password']) ){
                    $_SESSION['username'] = $username;
                    $_SESSION["login"] = true;
                    return true;
                }
            }
        } return false;
    }



   // public function user_logout() {
   //         $_SESSION['login'] = false;
   //         session_destroy();
    //    }
}