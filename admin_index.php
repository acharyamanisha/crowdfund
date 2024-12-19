<?php include("../admin/includes/functions.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FundHive</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="aa/admin/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/style.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="../admin/js/sweetalert.js"></script>
    <link rel="stylesheet" href="../admin/css/iziToast.min.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="../admin/js/iziToast.min.js"></script> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FundHive</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="aa/admin/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/style.css" type="text/css"> -->
    <script type="text/javascript" src="./js/sweetalert.js"></script>
    <link rel="stylesheet" href="./admin_css/iziToast.min.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="./js/iziToast.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            user-select: none;

        }

        body {
            background-color: rgb(162, 158, 158);
        }

        .primary__container {
            padding: 0px;
            background-color: #ffffff;
        }

        .inner__container {
            height: 92vh;
        }

        .container__title {
            color: #102B7B;
            font-weight: bold;
            padding: 10px 20px;
        }

        .border__bottom {
            border-bottom: 2px solid whitesmoke;
        }

        .p__20 {
            padding: 20px;
        }

        .admin__login__container {
            height: 100vh;
            background-image: url("../img/back.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            background-position: center;
        }

        .admin__login__form {
            width: 400px;
            background-color: #ffffff;
            border-radius: 3px;
            padding: 30px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid whitesmoke;
        }

        .grid__1 {
            display: grid;
            grid-template-columns: 100%;
            grid-row-gap: 10px;
        }

        .input__title {
            color: #000000;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input__control,
        .select__control,
        textarea {
            padding: 10px;
            width: 100%;
            border: 2px solid whitesmoke;
            border-radius: 3px;
            outline: none;
            transition: border .5s linear;
            font-size: 14px;
            font-weight: bold;
            resize: none;
        }

        .input__control:focus,
        .select__control:focus,
        textarea:focus {
            border: 2px solid #102B7B;
        }

        .btn {
            padding: 12px 20px;
            outline: none;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
        }

        .btn__primary {
            background-color: #102B7B;
            color: #ffffff;
            font-weight: bold;
        }

        input[type="date"] {
            padding: 9px 10px;
        }

        ::placeholder {
            opacity: 0.5;
        }

        .main__container {
            display: grid;
            grid-template-columns: 15% 85%;
            background-color: #f1f1f1;
        }

        .main__container .sidebar {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 15%;
            min-height: 100vh;
            max-height: 100vh;
            position: relative;
            background-color: #102B7B;
        }

        .sidebar__logo {
            height: 8vh;
            padding: 0 30px;
            color: rgba(249, 249, 249, .9);
            line-height: 8vh;
            font-size: 30px;
            font-weight: bold;
            border-bottom: 1px solid rgba(249, 249, 249, 0.1);
        }

        .sidebar ul {
            height: 90vh;
            padding: 20px;
            list-style-type: none;
        }

        .sidebar ul ul {
            height: auto;
            padding: 0 0 0 20px;
            list-style-type: none;
            display: none;
        }

        .sidebar ul li {
            position: relative;
        }

        .sidebar ul li a,
        .sidebar ul li div {
            text-decoration: none;
            color: rgba(249, 249, 249, 0.9);
            font-size: 15px;
            padding: 0 10px;
            font-weight: bold;
            display: grid;
            grid-template-columns: 10% 90%;
            grid-column-gap: 5%;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .sidebar ul li:last-child a {
            margin-bottom: 0px;
        }

        .sidebar ul li a.item__active {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }

        .sidebar ul li ion-icon {
            height: 40px;
            line-height: 40px;
            font-size: 20px;
        }

        .sidebar ul li p {
            line-height: 40px;
        }

        .tag {
            font-size: 14px;
            padding: 3px 10px;
            color: #ffffff;
            border-radius: 3px;
            font-weight: bold;
        }

        .tag__success {
            background-color: rgba(34, 139, 34, .1);
            color: rgba(34, 139, 34, 1);
        }

        .tag__danger {
            background-color: rgba(255, 8, 0, .1);
            color: rgba(255, 8, 0, 1);
        }

        .tag__warning {
            background-color: rgba(253, 106, 2, .1);
            color: rgba(253, 106, 2, 1);
        }

        table thead th:nth-child(1) {
            border-left: 2px solid whitesmoke;
        }

        table tbody tr td {
            border-right: 2px solid whitesmoke;
            border-bottom: 2px solid whitesmoke !important;
            text-align: left !important;
            border-top: none !important;
            padding: 10px !important;
            font-size: 14px !important;
            font-weight: normal !important;
        }

        table tbody td:nth-child(1) {
            border-left: 2px solid whitesmoke;
        }

        .action__group {
            display: inline-block;
        }

        .action {
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;
        }

        .action__danger {
            background-color: rgba(255, 8, 0, .1);
            color: rgba(255, 8, 0, 1);
        }

        .action__success {
            background-color: rgba(34, 139, 34, .1);
            color: rgba(34, 139, 34, 1);
        }

        .action__default {
            background-color: rgba(16, 43, 123, .1);
            color: rgb(16, 43, 123);
        }

        .action__warning {
            background-color: rgba(253, 106, 2, .1);
            color: rgba(253, 106, 2, 1);
        }

        .required {
            color: rgba(255, 8, 0, 1);
        }

        .header {
            position: fixed;
            top: 0;
            width: 85%;
            height: 8vh;
            background-color: white;
            padding: 10px 20px;
            border-bottom: 2px solid whitesmoke;
        }

        .content__container {
            position: absolute;
            top: 8vh;
            left: 15%;
            width: 85%;
            height: 92vh;
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['error'])) {
        ?>
        <script>
            iziToast.error({
                title: 'Error: ',
                message: '<?php echo safeInput($_GET['error']); ?>',
                timeout: 1000,
                position: 'topRight',
                backgroundColor: 'red',
                theme: 'light',
                color: 'white',
                onClosed: function () {
                    location.href = 'index.php';
                }
            });
        </script>
        <?php
    }
    ?>

    <div class="admin__login__container">
        <div class="admin__login__form">
            <form action="../admin/includes/requests.php?type=admin-login" method="POST">
                <div class="grid__1">
                    <div>
                        <p class="input__title">Email Address</p>
                        <input type="email" name="email" class="input__control" placeholder="Enter your email" required>
                    </div>
                    <div>
                        <p class="input__title">Password</p>
                        <input type="password" name="password" class="input__control" placeholder="Enter your password"
                            required>
                    </div>
                    <div class="button__group">
                        <button class="btn btn__primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>