<?php
include "login/ActionRegister.php";
?>
<?php require('dynamicHF/header.php'); ?>


<form method="POST" name="regForm" id="regFormID">
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
                               placeholder="Prezývka" id="username" name="username">
                    </div>


                    <div class="form-group">
                        <!--<label for="password"><b>Password</b></label>-->
                        <input class="text-center form-control form-rounded shadow" type="password"
                               placeholder="Heslo" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <!--<label for="name"><b>Name</b></label>-->
                        <input class="text-center form-control form-rounded shadow" type="text"
                               placeholder="Krstné meno" id="name" name="name">
                    </div>
                </div>

                <div class="col-sm">
                    <div class="form-group">
                        <!--<label for="last_name"><b>Last_name</b></label>-->
                        <input class="text-center form-control form-rounded shadow" type="text"
                               placeholder="Priezvisko" id="last_name" name="last_name">
                    </div>

                    <div class="form-group">
                        <!--<label for="address"><b>Address</b></label>-->
                        <input class="text-center form-control form-rounded shadow" type="text"
                               placeholder="Adresa" id="address" name="address">
                    </div>

                    <div class="form-group">
                        <!--<label for="email"><b>Email</b></label>-->
                        <input class="text-center form-control form-rounded shadow" type="text"
                               placeholder="Emailová adresa" id="email" name="email">
                    </div>
                </div>
            </div>
            <div>
                <label for="gender"><b>Pohlavie</b></label><br>
                <input class="inputbtn" type="radio" id="gender" name="gender" value="M"> Muž
                <input class="inputbtn" type="radio" id="gender1" name="gender" value="Z"> Žena
                <input class="inputbtn" type="radio" id="gender2" name="gender" value="I" checked="checked"> Iné
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

<script>
    $(function () {

        $("#regFormID").on("submit", function (e) {
            e.preventDefault();
            let form = $(this);
            if (validateRegistration())
                $.ajax({
                    method: "POST",
                    url: "/semestralka/postajax2.php",
                    data: form.serialize(),
                    success: function (response) {
                        //  alert(response);
                        if (response == "true") {
                            window.location.href = '/semestralka/login.php';
                            alert("Registracia prebehla úspešne, môžete sa prihlásiť.");
                        } else {
                            alert("Používatelské meno sa už používa.")
                        }
                    }
                });

        })

    })
</script>

<div class="spacerregistration"></div>


<?php include('dynamicHF/footer.php'); ?>
