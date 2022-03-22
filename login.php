<?php
session_start();
include "login/ActionLogin.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = new ActionLogin();
}
?>
<?php include('dynamicHF/footer.php'); ?>
<?php require('dynamicHF/header.php'); ?>





    <form method="POST">
        <div class="jumbotron shadow bg-white rounded text-center ">
            <h1>Prihlásenie</h1>
            <p>Pre prihlásenie vyplňte nasledujúce údaje.</p>
            <hr>

            <div class="form-group loginput">
                <!--  <label for="username"><b>Username</b></label> -->
                <input class="form-control form-rounded text-center shadow" type="text" placeholder="Používatelské meno"
                       id="username" name="username" required>
            </div>

            <div class="form-group loginput">
                <!-- <label for="password"><b>Password</b></label> -->
                <input class="form-control form-rounded text-center shadow" type="password" placeholder="Heslo"
                       id="password" name="password" required>
            </div>
            <hr>

            <button type="submit" class="btn btn-light shadow">Prihlásiť</button>

            <div>
            <?php if (isset($_GET['msgrgstr'])) echo($_GET['msgrgstr']); ?>
            </div>

            <div class="errMsg">
                <?php if (isset($_GET['mymessage'])) echo($_GET['mymessage']); ?>
            </div>

            <div class="container signin">
                <p>Nieste zaregistrovaný ? <br> <a href="registration.php">Zaregistrovať</a></p>
            </div>
        </div>
    </form>



