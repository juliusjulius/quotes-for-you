<?php
session_start();
include "Posts/PostCrude.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = new PostCrude();
}
?>
<?php include('dynamicHF/footer.php'); ?>
<?php require('dynamicHF/header.php'); ?>


<form method="POST">
    <div class="jumbotron shadow bg-white rounded text-center ">
        <h1>Pridať citát</h1>
        <p>Pre pridanie citátu vyplňte nasledujúce údaje.</p>
        <hr>


        <div class="md-form mb-4">
            <!--<label for="author">Autor</label>-->
            <textarea name="author" id="author" class="md-textarea form-control shadow form-rounded"
                      placeholder="Sem napíšte meno autora..." rows="1"
                      required></textarea>
        </div>

        <div class="md-form mb-4">
            <!--<label for="text">Tu môžte napísať citát...</label>-->
            <textarea name="text" id="text" class="md-textarea form-control shadow form-rounded"
                      placeholder="Sem napíšte citát..." rows="3" required></textarea>
        </div>
        <hr>

        <div>
            <label for="vyberte"><b>Vyberte karegóriu citátu</b></label><br>
            <select id="vyberte" name="type">
                <option name="option" value="alkohol">O alkohole</option>
                <option name="option" value="mudrost">O múdrosti</option>
                <option name="option" value="pokora">O pokore</option>
            </select>

        </div>

        <hr>

        <button type="submit" class="btn btn-light shadow">Odoslať</button>

        <div class="errMsg">
            <?php if (isset($_GET['msgAddPst'])) echo($_GET['msgAddPst']); ?>
        </div>

    </div>
</form>