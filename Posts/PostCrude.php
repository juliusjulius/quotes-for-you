<?php
include "login/Database.php";
include "Posts/Post.php";

class PostCrude
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {             /*v categories sa vždy vytvori inštancia, preto je nutné rozlišovať kde bol post zavolany */
            if (isset($_POST['text'])) {                        /*ak je setnuty text tak sa inštancia vytvorila (to je default na nahravanie postov)*/
                if ($this->addPost($_POST)) {
                    $myMessage = "Citát bol úspešne pridaný.";
                } else {
                    $myMessage = "Citát sa nepodarilo pridať.";
                }
                header("Location: http://localhost/semestralka/addPost.php?msgAddPst=" . $myMessage);
            }else {                                                                                                  /*a ak bol zaslany submit tak sa zavola nasledujuca metoda$$*/
                $message = $_POST['id'];
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    }


    public function addPost($param)
    {
        $text = $this->db->getDb()->real_escape_string($param['text']);
        $author = $this->db->getDb()->real_escape_string($param['author']);

        $stmtAddPost = $this->db->getDb()->prepare("INSERT INTO posts(username, type, text, author) VALUES (?,?,?,?)");
        $stmtAddPost->bind_param('ssss', $_SESSION['username'], $param['type'], $text, $author);
        if (!$stmtAddPost->execute()) {
            return false;
        }
        return true;
    }


    public function loadPosts($param)
    {
        $wantedPosts = array();
        $findPost = $this->db->getDb()->prepare("SELECT * FROM posts WHERE type=?");
        $findPost->bind_param('s', $param);
        if ($findPost->execute()) {
            $results = $findPost->get_result();
            if ($results->num_rows > 0) {
                while ($post = $results->fetch_assoc()) {
                    $wantedPosts[] = new Post($post['id'], $post['username'], $post['date'], $post['type'], $post['text'], $post['author']);
                }
            }
        } else {
            throw new Exception("Execute failed: ({$findPost->errno}, {$findPost->error}");
        }
        return $wantedPosts;
    }


}