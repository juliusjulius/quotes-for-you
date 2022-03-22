<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Semestrálna práca</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div class="my_container">
    <?php if (!isset($_SESSION['login'])){ ?>
        <div class="navbarNeprihlaseny ">
            <nav class="navbar navbar-expand-md navbar-light bg-light shadow bg-white rounded">
                <a href="home.php   " class="navbar-brand">
                    <img src="images/navbarLogo.png" height="38" alt="web logo, smiley">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="home.php" class="nav bold nav-item nav-link active">Domov</a>
                        <a href="fAlkohol.php" class="nav-item bold nav-link">O alkohole</a>
                        <a href="fMudrost.php" class="nav-item bold nav-link">O múdrosti</a>
                        <a href="fPokora.php" class="nav-item bold nav-link">O pokore</a>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <a href="login.php" class="nav-item bold nav-link">Prihlásenie</a>
                        <a href="registration.php" class="nav-item bold  nav-link">Registrácia</a>
                    </div>
                </div>
            </nav>
        </div>

    <?php }else{ ?>
    <div class="navbarPrihlaseny">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow bg-white rounded">
            <a href="#" class="navbar-brand">
                <img src="images/navbarLogo.png" height="38" alt="web logo, smiley">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="home.php" class="nav bold nav-item nav-link active">Domov</a>
                    <a href="fAlkohol.php" class="nav-item bold nav-link">O alkohole</a>
                    <a href="fMudrost.php" class="nav-item bold nav-link">O múdrosti</a>
                    <a href="fPokora.php" class="nav-item bold nav-link">O pokore</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <a href="addPost.php" class="nav-item bold nav-link">Pridať citát</a>
                    <a href="logout.php?q=logout" class="nav-item bold nav-link">Odhlásenie</a>
                </div>
            </div>
        </nav>
    </div>
<?php } ?>