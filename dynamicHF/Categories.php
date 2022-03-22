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

        <div class="jumbotron shadow bg-white rounded categoryJumbo">
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
                    </div>
                </div>

            <?php } ?>
        </div>


        <?php include('dynamicHF/footer.php');
    }
} ?>


