<!DOCTYPE html>
<html lang="sk">
<head>
    <title>Semestrálna práca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="js/validation.js"></script>
    <script src="https://kit.fontawesome.com/ffde0d1c5c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
<?php setlocale(LC_CTYPE, 'sk_SK'); ?>
<div class="my_container">
    <?php if (!isset($_SESSION['login'])){ ?>
        <div class="navbarNeprihlaseny ">
            <nav class="navbar navbar-expand-md navbar-light bg-light shadow bg-white rounded">
                <a href="home.php" class="navbar-brand">
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
            <a href="home.php" class="navbar-brand">
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