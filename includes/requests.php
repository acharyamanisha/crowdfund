<?php
include("functions.php");
ob_start();
$success="";
$error="";
$type=$_GET['type'];

if(isset($_SESSION['vendor_id'])){
    $vendor_id = $_SESSION["vendor_id"];
}

else if($type=='admin-login'){
    $email    = safeInput($_POST['email']);
    $password = safeInput($_POST['password']);

    $sql      = "SELECT email, password FROM admin WHERE email='$email' AND password='$password'";
    $query    = mysqli_query($conn,$sql);
    $record   = mysqli_fetch_assoc($query);
    $row      = mysqli_num_rows($query);

    if($row > 0){
        session_start();
        $_SESSION['email'] = $record['email'];
        $_SESSION['role']  = "Super Admin";
        header("Location: ../dashboard.php");
    }else{
        $error = "Invalid User Credentials!";
        header("Location: ../index.php?error=$error");
    }
}

?>