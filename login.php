<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
include("./includes.php")
    ?>
<link rel="stylesheet" href="css/custom.css">
<style>
    .form-signin {
        background-color: teal !important;
        width: 30% !important;
        min-width: 320px;
        display: flex;
        flex-direction: column;
        row-gap: 15px;
        padding: 15px;
        padding-top: 50px;
        padding-bottom: 50px;
        border-radius: 10px;
    }

    .form-box {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100dvh;
        width: 100%;
        background-color: wheat;
    }

    h1,
    span,
    a {
        text-align: center;
        color: white;
    }
</style>
</head>


<body>


    <div class="form-box">

        <form class="form-signin" method="POST" action="signinbackend.php">
            <h1> Sign In </h1>
            <input type="text" class="form-control" placeholder="Email" id="email" name="email" required autofocus>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Sign in
            </button>
            <span> New user? <a href="./signup.php"> Signup </a> </span>

        </form>
    </div>

</body>

</html>