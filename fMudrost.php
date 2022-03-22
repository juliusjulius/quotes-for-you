<?php
session_start();
include "Posts/PostCrude.php";

$post = new PostCrude();
?>
<?php require('dynamicHF/header.php'); ?>


<div class="jumbotron shadow bg-white rounded categoryJumbo">
    <h1 class="Citaty">Múdrosť</h1>
    <p>Pevne veríme že nájdete tie najlepšie inšpiratívne citáty.</p>
</div>

<p class="arrow text-center">&#8595;</p>


<div class="container">
    <?php
    $PostsFromDbArray = $post->loadPosts('alkohol');
    foreach ($PostsFromDbArray as &$Post) {
        ?>

        <div class="row text-center ">
            <div class="col-sm text-center shadow post">
                <div class="text"><p><?php echo utf8_encode($Post->getText()); ?></p></div>
                <div class="author"><p>- <?php echo utf8_encode($Post->getAuthor()); ?></p></div>
            </div>
        </div>

    <?php } ?>
</div>


<?php include('dynamicHF/footer.php'); ?>




