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

        <div class="jumbotron shadow bg-white rounded categoryJumbo" >
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
                        <div class="text"><p>&#8221; <?php echo $Post->getText(); ?> &#8220;</p></div>
                        <div class="author"><p>- <?php echo $Post->getAuthor(); ?></p></div>
                        <div class="vote">
                            <div class="voteArrw">

                                    <!--ziskam si ID postu-->
                                <button class="downVote voteButton" data-vote-type="down"  data-post-id="<?php echo $Post->getId(); ?>">&#9661;</button>

                                <p class="postVotes" data-post-id="<?php echo $Post->getId(); ?>"><?php echo $post->getVoteStat($Post->getId()); ?></p>

                                    <!--ziskam si ID postu-->
                                <button class="downVote voteButton" data-vote-type="up" data-post-id="<?php echo $Post->getId(); ?>">&#9651;</button>

                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
        <script>
            $(function(){

                $(".voteButton").on("click", function(e) {
                    e.preventDefault();

                    var postID = $(this).attr("data-post-id");
                    var data = { id: postID };
                    if($(this).attr("data-vote-type") == "up") {
                        data['upVote'] = true;
                    } else {
                        data['downVote'] = true;
                    }

                    $.ajax({
                        method: "POST",
                        url: "/semestralka/postajax.php",
                        data: data,
                        success: function(response) {
                            console.log(response);
                            $('p[data-post-id='+postID+']').text(response);
                        }
                    });

                })

            })
        </script>

        <?php include('dynamicHF/footer.php');
    }
} ?>
















