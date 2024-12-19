<?php
include("includes/connect.php");
session_start();
session_destroy();
header("Location: admin_index.php");
?>