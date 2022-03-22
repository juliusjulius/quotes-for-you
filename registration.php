<?php
include "login/ActionRegister.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg = new ActionRegister();
}
?>
<?php include('dynamicHF/footer.php'); ?>
<?php require('dynamicHF/header.php'); ?>



    <form method="POST">
        <div class="jumbotron shadow bg-white rounded text-center reg ">
            <div class="container">
                <h1>Registrácia</h1>
                <p>Pre registráciu vyplňte nasledujúce údaje.</p>
                <hr>

                <div class="row">
                    <div class="col-sm">

                        <div class="form-group">
                            <!-- <label for="username"><b>Username</b></label> -->
                            <input class="text-center form-control form-rounded shadow" type="text"
                                   placeholder="Prezývka" id="username" name="username" required>
                        </div>


                        <div class="form-group">
                            <!--<label for="password"><b>Password</b></label>-->
                            <input class="text-center form-control form-rounded shadow" type="password"
                                   placeholder="Heslo" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <!--<label for="name"><b>Name</b></label>-->
                            <input class="text-center form-control form-rounded shadow" type="text"
                                   placeholder="Krstné meno" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="col-sm">
                        <div class="form-group">
                            <!--<label for="last_name"><b>Last_name</b></label>-->
                            <input class="text-center form-control form-rounded shadow" type="text"
                                   placeholder="Priezvisko" id="last_name" name="last_name" required>
                        </div>

                        <div class="form-group">
                            <!--<label for="address"><b>Address</b></label>-->
                            <input class="text-center form-control form-rounded shadow" type="text"
                                   placeholder="Adresa" id="address" name="address" required>
                        </div>

                        <div class="form-group">
                            <!--<label for="email"><b>Email</b></label>-->
                            <input class="text-center form-control form-rounded shadow" type="email"
                                   placeholder="Emailová adresa" id="email" name="email" required>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="gender"><b>Pohlavie</b></label><br>
                    <input class="inputbtn" type="radio" id="gender" name="gender" value="M" required> Muž
                    <input class="inputbtn" type="radio" id="gender" name="gender" value="Z" required> Žena
                    <input class="inputbtn" type="radio" id="gender" name="gender" value="I" required> Iné
                    <hr>

                </div>

                <button type="submit" class="registerbtn btn btn-light shadow">Registrovať</button>
            </div>

            <div class="errMsg">
                <?php if (isset($_GET['msgmail'])) echo($_GET['msgmail']); ?>
                <?php if (isset($_GET['msgusrnm'])) echo($_GET['msgusrnm']); ?>
            </div>

            <div class="container signin">
                <p>Už ste zaregistrovaný ? <br> <a href="login.php">Prihlásiť</a></p>
            </div>
        </div>

    </form>


