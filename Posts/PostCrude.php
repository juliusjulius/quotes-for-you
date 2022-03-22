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
            } else {                                                                                                  /*a ak bol zaslany submit tak sa zavola nasledujuca metoda$$*/
                $this->voteForPost($_POST);
            }
        }
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

    public function voteForPost($param)
    {
        $voteForPost = $this->db->getDb()->prepare("SELECT * FROM vote WHERE post_id=? and username=?");           //kontrola tabulky Vote (vysledok hovori o tom či hlasoval alebo nie)
        $voteForPost->bind_param('is', $param['id'], $_SESSION['username']);
        if ($voteForPost->execute()) {
            $results = $voteForPost->get_result();

            if ($results->num_rows > 0) {
                if (isset($param['downVote'])) {                                                                            //ak sa nachadza v tabulke teda už hlasoval a da downvote
                    $deleteUserVote = $this->db->getDb()->prepare("DELETE FROM vote WHERE post_id=? and username=?");
                    $deleteUserVote->bind_param('is', $param['id'], $_SESSION['username']);

                    if (!$deleteUserVote->execute()) {
                        throw new Exception("Execute failed: ({$deleteUserVote->errno}, {$deleteUserVote->error}");
                    }
                }else{
                    return false;
                }
            } else {
                    $markUser = $this->db->getDb()->prepare("INSERT INTO vote(post_id, username) VALUES (?,?)");   //ak sa nenachadza v tabulke (teda ešte nehlasoval) tak ho pridaj
                    $markUser->bind_param('is', $param['id'], $_SESSION['username']);
                    if (!$markUser->execute()) {
                        throw new Exception("Execute failed: ({$markUser->errno}, {$markUser->error}");
                    }
                $postId = $param['id'];
                if (isset($param['upVote'])) {                      //ak dal upvote tak incrementni voteStat
                    $num = 1;
                    $this->updateStat($postId, $num);
                } else {
                    $num = -1;                                       //ak dal downVote tak decrementni voteStat
                    $this->updateStat($postId, $num);
                }
            }
        }
        return true;
    }

    public function updateStat($postId, $num)
    {
        $updateStat = $this->db->getDb()->prepare("UPDATE posts SET voteStat = (voteStat + ?)  WHERE id=?");
        $updateStat->bind_param('ii',  $num, $postId);
        $updateStat->execute();
    }

}