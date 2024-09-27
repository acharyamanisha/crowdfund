<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include("./includes.php")
        ?>
    <style>
        .form-signup {
        background-color: teal !important;
        width: 30% !important;
        min-width: 320px;
        display: flex !important;
        flex-direction: column !important;
        
        padding: 15px;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 10px;
    }

    .form-box {
        display: flex;
        justify-content: center;
        align-items: center;
        
        width: 100%;
        background-color: wheat;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    label{
        color:white;
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

    <form class="form-signup" data-toggle="validator" role="form" method="POST" action="signupback.php">
    
    <h1> Sign Up </h1>
    
        <label for="inputName" class="control-label">First Name</label>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
    
    
    
    
        <label for="inputName" class="control-label">Last Name</label>
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
    
    
    
    
        <label for="inputEmail" class="control-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
            data-error="Wrong Email id or username" required>
        <div class="help-block with-errors"></div>
    
    
    
        <label for="inputName" class="control-label">Address</label>
        <input type="text" class="form-control" id="address_line_1" name="address_line_1" placeholder="Address">
    
    
        <!-- <div class="form-group">
                                    <label for="inputName" class="control-label">Address Line 2</label>
                                    <input type="text" class="form-control" id="address_line_2" name="address_line_2"
                                        placeholder="Address Line 2">
                                </div> -->
    
    
        <label for="inputName" class="control-label">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
    
    
    
        <label for="inputName" class="control-label">State</label>
        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
    
    
        <!-- <div class="form-group">
                                    <label for="inputName" class="control-label">zip</label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip"
                                        required>
                                </div> -->
    
    
        <label for="inputName" class="control-label">Country</label>
        <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" required>
    
    
    
        <label for="inputName" class="control-label">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" onkeup="phoneno()"
            minlength="10" maxlength="10" required pattern="[0-9]{10}">
    
    
        <!-- <div class="form-group">
                                    <label for="inputName" class="control-label">Esewa Number</label>
                                    <input type="text" class="form-control" id="credit_card_number"
                                        name="credit_card_number" placeholder="Enter Credit Card Number"
                                        onkeup="creditcard()" minlength="10" maxlength="10" required
                                        pattern="[0-9]{10}">
                                </div> -->
    
        <!-- <div class="form-group">
                                    <label for="inputName" class="control-label">CVV</label>
                                    <input type="text" class="form-control" id="cvv" name="cvv" pattern="[0-9]{3}"
                                        placeholder="Enter CVV" onkeup="cvv()" required minlength="3" maxlength="3">
                                </div> -->
    
    
        <script>
            function phoneno() {
                $('#phone').keypress(function (e) {
                    var a = [];
                    var k = e.which;
    
                    for (i = 48; i < 58; i++)
                        a.push(i);
    
                    if (!(a.indexOf(k) >= 0))
                        e.preventDefault();
                });
            }
    
            // function creditcard() {
            //     $('#phone').keypress(function(e) {
            //         var a = [];
            //         var k = e.which;
    
            //         for (i = 48; i < 64; i++)
            //             a.push(i);
    
            //         if (!(a.indexOf(k) >= 0))
            //             e.preventDefault();
            //     });
            // }
    
            // function cvv() {
            //     $('#phone').keypress(function(e) {
            //         var a = [];
            //         var k = e.which;
    
            //         for (i = 48; i < 51; i++)
            //             a.push(i);
    
            //         if (!(a.indexOf(k) >= 0))
            //             e.preventDefault();
            //     });
            // }
        </script>
    
    
        <!-- <div class="form-group">
                                    <label for="inputName" class="control-label">Expiration Month</label>
                                    <select name="month" class="form-control" id="month">
                                        <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= $i ?></option>
                                        <?php endfor ?>
                                    </select>
                                </div> -->
    
        <!-- <div class="form-group">
                                    <label for="inputName" class="control-label">Expiration Year</label>
                                    <select name="year" class="form-control" id="year">
                                        <?php for ($i = 2017; $i <= 2025; $i++): ?>
                                        <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= $i ?></option>
                                        <?php endfor ?>
                                    </select>
                                </div> -->
    
    
        <label for="inputPassword" class="control-label">Password</label>
    
    
        <input type="password" data-minlength="6" class="form-control" name="password" id="password"
            placeholder="Password" required>
        
    
            <label for="inputPassword" class="control-label">Confirm Password</label>
        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
            onkeyup="checkPassword();" placeholder="Confirm" required>
        <span id='message'></span>
        <div class="help-block with-errors"></div>
    
    
    
    
    
    
        <button type="submit" id="submitButton" class="btn btn-primary mt-2">Submit</button>
        <span> Already a member? <a href="./login.php"> Signin </a> </span>
    </form>
</div>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.7/validator.js"></script>

</body>

</html>