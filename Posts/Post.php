<?php


class Post
{
    private $id;
    private $username;
    private $date;
    private $type;
    private $text;
    private $author;

    public function __construct($id, $username, $date, $type, $text, $author)
    {
        $this->id = $id;
        $this->username = $username;
        $this->date = $date;
        $this->type = $type;
        $this->text = $text;
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }



}