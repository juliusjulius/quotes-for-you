<?php
include "ActionRegister.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg = new ActionRegister();
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
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="text" placeholder="Enter Password" name="password" required>

        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" required>

        <label for="last_name"><b>Last_name</b></label>
        <input type="text" placeholder="Enter Last name" name="last_name" required>

        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="gender"><b>Gender</b></label>
        <input type="text" placeholder="Gender" name="gender" required>
        <hr>


        <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
</form>

</body>
</html>