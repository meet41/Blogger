<?php
    // require('');
    function allpost(){
    $db = mysqli_connect("localhost","root","","bloggers");
    $q = "select * from blogs order by id desc";
    $a = mysqli_query($db,$q);
    $data = array();
    while($b=mysqli_fetch_assoc($a)){
        $data[]=$b;
    }
    return $data;
    }
?>