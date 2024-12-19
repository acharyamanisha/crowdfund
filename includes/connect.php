<?php
    date_default_timezone_set("Asia/Kathmandu");
    $conn=mysqli_connect("localhost","root","","fundraise");
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }
?>