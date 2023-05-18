<?php
    session_start();
    if(isset($_SESSION['name']))
    {
        session_unset();
        session_destroy();
        // echo "<script>alert('You Logout Successfully!');</script>";
        header("location:login.php");
    }
?>