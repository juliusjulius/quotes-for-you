<?php
include "login/Database.php";
include "Posts/Post.php";

class PostCrude
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

        if ($_SERVER["REQUEST_METHOD"] == "POST" ) {             /*v categories sa vždy vytvori inštancia, preto je nutné rozlišovať kde bol post zavolany */
            if (isset($_POST['text'])) {                        /*ak je setnuty text tak sa inštancia vytvorila (to je default na nahravanie postov)*/
                if ($this->addPost($_POST)) {
                    $myMessage = "Citát bol úspešne pridaný.";
                } else {
                    $myMessage = "Citát sa nepodarilo pridať.";
                }
                header("Location: http://localhost/semestralka/addPost.php?msgAddPst=" . $myMessage);
            } else {                                                                                                  /*a ak bol zaslany submit tak sa zavola nasledujuca metoda$$*/
                if(isset($_SESSION['login'])) {
                    $this->voteForPost($_POST);
                }
            }
        }
    }

    public function addPost($param)
    {
        $text = $this->db->getDb()->real_escape_string($param['text']);
        $author = $this->db->getDb()->real_escape_string($param['author']);
        $postVotes = 0;

        $stmtAddPost = $this->db->getDb()->prepare("INSERT INTO posts(username, type, text, author, voteStat) VALUES (?,?,?,?,?)");
        $stmtAddPost->bind_param('ssssi', $_SESSION['username'], $param['type'], $text, $author, $postVotes);
        if (!$stmtAddPost->execute()) {
            return false;
        }
        return true;
    }

    public function voteForPost($param)
    {
        $postId = $param['id'];

        if ($this->checkIfVoted($param)) {                                                     //*************ak sa nachadza v tabulke***********
            if ($this->checkResultOfVote($param) == 1) {                                      //ak má v tabulke hodnotu 1 teda predtým hlasoval za upVote
                if (isset($param['downVote'])) {                                                //a teraz ak hlasoval za downvote tak sa to vynuluje a tym padom sa vymaže zaznam
                    $num = -1;
                    $this->deleteUserFromVoted($param, $num);                                     //zaznam z tabulky o tom že hlasoval bol vymazany tak treba znižiť hodnotenie postu
                }else{
                    return false;                                                          //ak mal upVote a znovu dal upVote tak vrat false
                }
            } else {                                                                     //ak sa nachadza v tabulke a má tam uloženy downVote
                if (isset($param['upVote'])) {                                             // a vyberie možnosť upVote (teda sa to znuluje)
                    $num = 1;
                    $this->deleteUserFromVoted($param, $num);
                }else{
                    return false;                                                          //ak mal downVote a znovu dal downVote tak vrat false
                }
            }
        } else {                                                                           //*************ak sa nenachadza v tabulke **********

            if (isset($param['upVote'])) {                      //ak dal upvote tak incrementni voteStat
                $num = 1;
                $this->updateStat($postId, $num);
            } else {
                $num = -1;                                       //ak dal downVote tak decrementni voteStat
                $this->updateStat($postId, $num);
            }

            $markUser = $this->db->getDb()->prepare("INSERT INTO vote(post_id, username, voteOption) VALUES (?,?,?)");   //ak sa nenachadza v tabulke (teda ešte nehlasoval) tak ho pridaj
            $markUser->bind_param('isi', $param['id'], $_SESSION['username'], $num);
            if (!$markUser->execute()) {
                throw new Exception("Execute failed: ({$markUser->errno}, {$markUser->error}");
            }
        }
        return true;
    }

    public function checkIfVoted($param)
    {
        $voteForPost = $this->db->getDb()->prepare("SELECT * FROM vote WHERE post_id=? and username=?");           //kontrola tabulky Vote (vysledok hovori o tom či hlasoval alebo nie)
        $voteForPost->bind_param('is', $param['id'], $_SESSION['username']);

        if ($voteForPost->execute()) {
            $results = $voteForPost->get_result();

            if ($results->num_rows > 0) {
                return true;
            }
        }
        return false;
    }

    public function updateStat($postId, $num)
    {
        $updateStat = $this->db->getDb()->prepare("UPDATE posts SET voteStat = (voteStat + ?)  WHERE id=?");
        $updateStat->bind_param('ii', $num, $postId);
        $updateStat->execute();
    }

    public function checkResultOfVote($param)                   //Ak už volil tak chcem vedieť ako volil (upvote1 dowvote-1)
    {
        $ResultOfVote = $this->db->getDb()->prepare("SELECT voteOption FROM vote WHERE post_id=? and username=?");
        $ResultOfVote->bind_param('is', $param['id'], $_SESSION['username']);

        $ResultOfVote->execute();
        $results = $ResultOfVote->get_result()->fetch_row();
        return $results[0];
    }

    public function deleteUserFromVoted($param, $num){
        $deleteUserVote = $this->db->getDb()->prepare("DELETE FROM vote WHERE post_id=? and username=?");
        $deleteUserVote->bind_param('is', $param['id'], $_SESSION['username']);
        if (!$deleteUserVote->execute()) {
            throw new Exception("Execute failed: ({$deleteUserVote->errno}, {$deleteUserVote->error}");
        }
        $this->updateStat($param['id'], $num);
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

    public function getVoteStat($id){
        $ResultOfVote = $this->db->getDb()->prepare("SELECT voteStat FROM posts WHERE id=?");
        $ResultOfVote->bind_param('i', $id);

        $ResultOfVote->execute();
        $results = $ResultOfVote->get_result()->fetch_row();
        return $results[0];
    }
}