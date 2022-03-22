<?php
session_start();
include "ActionLogin.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = new ActionLogin();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>

<form method="POST">
    <div class="container">
        <h1>Login</h1>
        <p>Please fill in this form to login account.</p>
        <hr>

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="text" placeholder="Enter Password" name="password" required>
        <hr>


        <button type="submit" class="loginbtn">Login</button>
    </div>

    <div>
        <?php
           if(isset($_GET['mymessage'])) {
               echo($_GET['mymessage']);
           }
         ?>
    </div>

</form>

</body>
</html>