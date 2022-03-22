<?php

class User
{
    private $username;
    private $password;
    private $name;
    private $last_name;
    private $address;
    private $email;
    private $gender;


    public function __construct($username, $password, $name, $last_name, $address, $email, $gender)
    {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->name = $name;
        $this->last_name = $last_name;
        $this->address = $address;
        $this->email = $email;
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }


}