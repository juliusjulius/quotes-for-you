<?php

class Categories
{
    public function pickCategory($header, $category)
    {
        session_start();
        include "Posts/PostCrude.php";
            $post = new PostCrude();
        require('dynamicHF/header.php');
        ?>

        <div class="jumbotron shadow bg-white rounded categoryJumbo" xmlns="http://www.w3.org/1999/html">
            <h1 class="Citaty"><?php echo($header) ?></h1>
            <p>Pevne veríme že nájdete tie najlepšie inšpiratívne citáty.</p>
        </div>

        <p class="arrow text-center">&#8595;</p>


        <div class="container">
            <?php
            $PostsFromDbArray = $post->loadPosts($category);
            foreach ($PostsFromDbArray as &$Post) {
                ?>

                <div class="row text-center ">
                    <div class="col-sm text-center shadow post">
                        <div class="text"><p>„ <?php echo $Post->getText(); ?>“</p></div>
                        <div class="author"><p>- <?php echo $Post->getAuthor(); ?></p></div>
                        <div class="vote">
                                <div class="voteArrw">
                                    <form class="formIn" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $Post->getId(); ?>">  <!--ziskam si ID postu-->
                                   <input  class="downVote" type="submit" value="&#9661;" id="downVote" name="downVote">
                            </form>
                                    <p>39</p>
                            <form class="formIn" method="POST">
                                <input type="hidden" name="id" value="<?php echo $Post->getId(); ?>">  <!--ziskam si ID postu-->
                                    <input  class="downVote" type="submit" value="&#8420;" id="upVote" name="upVote">
                            </form>
                                </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>


        <?php include('dynamicHF/footer.php');
    }
} ?>


