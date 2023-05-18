<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $con = mysqli_connect("localhost","root","","bloggers");
        $d = "delete from blogs where id='$id'";
        if(mysqli_query($con,$d)){
            header("location:profile.php");
        }
    }
?>