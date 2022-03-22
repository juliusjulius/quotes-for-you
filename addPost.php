<?php
session_start();
include "Posts/PostCrude.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['text']) && !empty($_POST['author'])) {
    $post = new PostCrude();
}
?>

<?php require('dynamicHF/header.php'); ?>


    <form name="addPostForm" method="POST" onsubmit="return validateAddPost()">
        <div class="jumbotron shadow bg-white rounded text-center ">
            <h1>Pridať citát</h1>
            <p>Pre pridanie citátu vyplňte nasledujúce údaje.</p>
            <hr>


            <div class="md-form mb-4">
                <!--<label for="author">Autor</label>-->
                <textarea name="author" id="author" class="md-textarea form-control shadow form-rounded"
                          placeholder="Sem napíšte meno autora..." rows="1"
                          ></textarea>
            </div>

            <div class="md-form mb-4">
                <!--<label for="text">Tu môžte napísať citát...</label>-->
                <textarea name="text" id="text" class="md-textarea form-control shadow form-rounded"
                          placeholder="Sem napíšte citát..." rows="3" ></textarea>
            </div>
            <hr>

            <div>
                <label for="vyberte"><b>Vyberte karegóriu citátu</b></label><br>
                <select id="vyberte" name="type">
                    <option  value="alkohol">O alkohole</option>
                    <option  value="mudrost">O múdrosti</option>
                    <option  value="pokora">O pokore</option>
                </select>

            </div>

            <hr>

            <button type="submit" class="btn btn-light shadow">Odoslať</button>

            <div class="errMsg">
                <?php if (isset($_GET['msgAddPst'])) echo($_GET['msgAddPst']); ?>
            </div>

        </div>
    </form>
    <div class="spacerAddPost"></div>

<?php include('dynamicHF/footer.php'); ?>